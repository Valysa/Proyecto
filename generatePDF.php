<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les IDs sélectionnés
    $n = 1;
    $selectedIDs = array(); 
    while (isset($_POST["ref" . $n])) {
        $selectedIDs[$n-1] = $_POST["ref" . $n];
        $n++;
    }

    // Chemin vers le fichier CSV
    $csvFile = 'BDD2/reference.csv';

    // Chemin de sortie du fichier PDF
    $outputFile = __DIR__ . '/references.pdf';

    // Lecture du fichier CSV
    $csvData = file($csvFile);

    // Tableau pour stocker les lignes sélectionnées
    $selectedRows = [];

    // Parcourir les lignes du CSV
    foreach ($csvData as $csvLine) {
        $lineData = str_getcsv($csvLine);

        // Vérifier si l'ID de la ligne est sélectionné
        if (in_array($lineData[0], $selectedIDs)) {
            // Ajouter la ligne au tableau des lignes sélectionnées
            $selectedRows[] = $lineData;
        }
    }

    // Générer le contenu du fichier PDF
    $pdfContent = '';
    foreach ($selectedRows as $row) {
        // Récupérer les valeurs de chaque colonne
        $id = $row[0];
        $col1 = $row[1];
        $col2 = $row[2];
        $col3 = $row[3];
        $col4 = $row[4];
        $col5 = $row[5];
        $col6 = $row[6];

        // Ajouter la ligne au contenu du PDF
        $pdfContent .= "ID: $id\n";
        $pdfContent .= "Colonne 1: $col1\n";
        $pdfContent .= "Colonne 2: $col2\n";
        $pdfContent .= "Colonne 3: $col3\n";
        $pdfContent .= "Colonne 4: $col4\n";
        $pdfContent .= "Colonne 5: $col5\n";
        $pdfContent .= "Colonne 6: $col6\n";
        $pdfContent .= "\n";
    }

    // Générer le fichier PDF
    // Ici, vous devez utiliser une bibliothèque pour générer le PDF, telle que TCPDF ou FPDF
    // Voici un exemple en utilisant TCPDF :
    require_once('tcpdf/tcpdf.php');

    $pdf = new TCPDF();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Write(0, $pdfContent);
    $pdf->Output($outputFile, 'F');

    // Afficher un lien vers le fichier PDF généré
    echo "Le fichier PDF a été généré avec succès. <a href='references.pdf'>Télécharger le PDF</a>";
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SERVER['QUERY_STRING'])) {
    // Récupérer les valeurs depuis $_SERVER['QUERY_STRING']
    parse_str($_SERVER['QUERY_STRING'], $queryParams);

    // Récupérer les IDs sélectionnés
    $selectedIDs = explode(",", $queryParams["selection"]);

    // Effectuer une redirection POST vers la même page
    $redirectURL = $_SERVER['PHP_SELF'];
    echo "<html>";
    echo "<body onload='document.forms[0].submit()'>";
    echo "<form action='$redirectURL' method='POST'>";
    foreach ($selectedIDs as $id) {
        echo "<input type='hidden' name='ref' value='$id'>";
    }
    echo "</form>";
    echo "</body>";
    echo "</html>";
    exit;
}
?>
