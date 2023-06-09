<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Affichage CSV</title>
    <link rel="stylesheet" href="css/proyecto.css">
</head>

<body>
    <form action="sendmailtoreferent.php" method="POST">
        <div class="container">
            <?php
            session_start();
            $file = fopen('BDD2/reference.csv', 'r');
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
            foreach ($data as $row) {
                if ($row[5] == $_SESSION["ID"]) {
                    $info1 = $row[3]; // Première colonne du CSV
                    $info2 = $row[2]; // Deuxième colonne du CSV
                    $info3 = $row[1]; // Troisième colonne du CSV
                    if($row[6] == "validated"){
                        echo '<div class="row">';
                        echo '<div class="styled-box">';
                        echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</div>';
                    }
                    else{
                        echo '<div class="row">';
                        echo '<div class="styled-box">';
                        echo 'Cette référence est en attente de validation';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</div>';
                    }
                }
            }
            ?>
            <div class="row">
                <input type="submit" value="Valider" style="float: right;">
            </div>
        </div>
    </form>
</body>

</html>