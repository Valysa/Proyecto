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
            $counter = 0;
            foreach ($data as $row) {
                $info1 = $row[3]; // Première colonne du CSV
                $info2 = $row[2]; // Deuxième colonne du CSV
                $info3 = $row[1]; // Troisième colonne du CSV

                echo '<div class="row">';
                echo '<div class="styled-box">';
                echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                echo '<p>' . $info1 . '</p>';
                echo '<p>' . $info2 . '</p>';
                echo '<p>' . $info3 . '</p>';
                echo '</div>';
                $counter++;
                if ($counter % 2 == 0) {
                    echo '</div>';
                    $counter = 0;
                }
            }
            if ($counter % 2 != 0) {
                echo '</div>';
            }
            ?>
            <div class="row">
                <input type="submit" value="Valider" style="float: right;">
            </div>
        </div>
    </form>
</body>
</html>
