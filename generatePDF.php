<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les IDs sélectionnés
    $n = 1;
    $selectedIDs = array(); 
    while (isset($_GET["ref" . $n])) {
        $selectedIDs[] = $_GET["ref" . $n];
        $n++;
    }


    // Chemin vers le fichier CSV
    $csvFile = 'BDD2/reference.csv';

    // Chemin de sortie du fichier PDF
    $outputFile = __DIR__ . '/references.pdf';

    // Lecture du fichier CSV
    $file = fopen($csvFile, 'r');
    $data = [];
    $firstLineSkipped = false;
    while (($row = fgetcsv($file, 1000, ',')) !== false) {
        if (!$firstLineSkipped) {
            $firstLineSkipped = true;
            continue; // Ignore la première ligne du CSV
        }
        $data[] = $row;
    }
    fclose($file);

    // Tableau pour stocker les lignes sélectionnées
    $selectedRows = [];

    // Filtrer les lignes du CSV en fonction des ID sélectionnées
    foreach ($selectedIDs as $selectedID) {
        echo $selectedID ;
        foreach ($data as $row) {
            if ($row[0] == $selectedID) {
                $selectedRows[] = $row;
            }
        }
    }
    $skills = [
        0 => "Ponctualité",
        1 => "Confiance",
        2 => "Sérieux",
        3 => "Honnêteté",
        4 => "Passionné",
        5 => "Bienveillance",
        6 => "Respect",
        7 => "Juste",
        8 => "Impartial",
        9 => "Travail"
    ];
    for ($i = 0; $i < 4; $i++) {
        if (isset($_SESSION[$i])) {
            echo $skills[$_SESSION[$i]];
            echo "<br>";
        }
    }

    // Générer le contenu du fichier PDF
    $pdfContent = '';
    foreach ($selectedRows as $row) {
        $skill = "";
if (isset($row[7])) {
    $skillsIndices = str_split($row[7]);
    foreach ($skillsIndices as $index) {
        if (isset($skills[$index])) {
            $skill .= $skills[$index];
            $skill .= "  ";
        }
    }
}

        // Récupérer les valeurs de chaque colonne
        $id = $row[0];
        $col1 = $row[1];
        $col2 = $row[2];
        $col3 = $row[3];
        $col4 = $row[4];
        $col5 = $row[5];
        $col6 = $row[6];
        $col7 = $row[7];
        $col8 = $row[8];

        // Ajouter la ligne au contenu du PDF
        //$pdfContent .= "ID: $id\n";
        $pdfContent .= "$col1\n";
        $pdfContent .= "Sous la résponsabilité de $col3 $col2\n";
        $pdfContent .= ": $col8\n";
        $pdfContent .= "Coordonées : $col4\n";
        //$pdfContent .= "Colonne 5: $col5\n";
        //$pdfContent .= "Colonne 6: $col6\n";
        $pdfContent .= "cela à permis de dévlopper : ". $skill;
        $pdfContent .= "\n";
    }

    // Générer le fichier PDF
    require_once('tcpdf/tcpdf.php');
    echo "pdf content is ". $pdfContent;
    $pdf = new TCPDF();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Write(0, $pdfContent);
    $pdf->Output($outputFile, 'F');

    // Afficher un lien vers le fichier PDF généré
    echo "Le fichier PDF a été généré avec succès. <a href='references.pdf'>Télécharger le PDF</a>";
}

// Le reste du code pour gérer la redirection GET reste inchangé
?>
