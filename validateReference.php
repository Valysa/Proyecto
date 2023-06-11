<?php
// Récupérer la valeur de $_GET['ref']
$ref = $_GET['ref'];
if(isset($_GET['invalid'])){
    $valeur = "invalid";
}
else{
    $valeur = "validated";
}

// Chemin vers le fichier CSV
$csvFile = 'BDD2/reference.csv';

// Lire le fichier CSV
$lines = file($csvFile, FILE_IGNORE_NEW_LINES);
$l = '';
// Ignorer la première ligne
$firstLineSkipped = false;

// Parcourir chaque ligne du fichier
foreach ($lines as $line) {
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
        $champs = count($data); //compte le nombre de champs de la ligne
        $l = $data[0];
        for($i=1; $i<$champs; $i++){
            $l = $l.','.$data[$i];    
        }

    }
    // Reconstruire la ligne avec les colonnes modifiées
    $line = implode(',', $data);
}
echo "...";
echo $l;
echo "...";
if(($_POST['comments'] == "")){
    header("Location: refID.php?".$_SERVER['QUERY_STRING']);
    exit;
}
echo $_POST['comments'];
$newl = $l.','.$_POST['comments'].PHP_EOL;
echo $newl;


// Réécrire le fichier CSV avec les modifications
file_put_contents($csvFile, implode("\n", $lines));
file_put_contents("BDD2/reference.csv", preg_replace('/'.$l.'/', $newl, file_get_contents("BDD2/reference.csv"), 1));
// Rediriger vers la page remerciement.php
header("Location: remerciementr.html");
exit;
?>
