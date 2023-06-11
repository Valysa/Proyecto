<?php
// Récupérer la valeur de $_GET['ref']
$ref = $_GET['ref'];
if($_GET['invalide'] == 1){
    $valeur = "invalid";
}
else{
    $valeur = "validated";
}

// Chemin vers le fichier CSV
$csvFile = 'BDD2/reference.csv';

// Lire le fichier CSV
$lines = file($csvFile, FILE_IGNORE_NEW_LINES);

// Ignorer la première ligne
$firstLineSkipped = false;

// Parcourir chaque ligne du fichier
foreach ($lines as &$line) {
    // Vérifier si c'est la première ligne
    if (!$firstLineSkipped) {
        $firstLineSkipped = true;
        continue; // Ignorer la première ligne
    }

    // Diviser la ligne en colonnes en utilisant la virgule comme séparateur
    $data = str_getcsv($line);

    // Vérifier si la première colonne correspond à la valeur de $_GET['ref']
    if ($data[0] == $ref) {
        // Modifier la valeur "waiting" par "validated"
        $data[6] = $valeur;
    }

    // Reconstruire la ligne avec les colonnes modifiées
    $line = implode(',', $data);
}

// Réécrire le fichier CSV avec les modifications
file_put_contents($csvFile, implode("\n", $lines));

// Rediriger vers la page remerciement.php
header("Location: remerciementr.html");
exit;
?>
