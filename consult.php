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
            $i = 1;
            echo '<table>';
            foreach ($data as $row) {
                if ($row[5] == $_SESSION["ID"]) {
                    $i++;
                    if ($i % 2 == 0) {
                        $info1 = $row[3]; // Première colonne du CSV
                        $info2 = $row[2]; // Deuxième colonne du CSV
                        $info3 = $row[1]; // Troisième colonne du CSV
                        if ($row[6] == "validated") {
                            echo '<tr><td>';
                            echo '<div class="styled-box">';
                            echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                            echo '<p>' . $info1 . '</p>';
                            echo '<p>' . $info2 . '</p>';
                            echo '<p>' . $info3 . '</p>';
                            echo '</div>';
                            echo '</td>' ;
                        } else {
                            echo '<tr><td>';
                            echo '<div class="styled-box">';
                            echo 'cette reference est en attente de validation';
                            echo '<p>' . $info1 . '</p>';
                            echo '<p>' . $info2 . '</p>';
                            echo '<p>' . $info3 . '</p>';
                            echo '</div>';
                            echo '</td>' ;
                        }
                    }
                    else{
                        $info1 = $row[3]; // Première colonne du CSV
                        $info2 = $row[2]; // Deuxième colonne du CSV
                        $info3 = $row[1]; // Troisième colonne du CSV
                        if ($row[6] == "validated") {
                            echo '<td>';
                            echo '<div class="styled-box">';
                            echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                            echo '<p>' . $info1 . '</p>';
                            echo '<p>' . $info2 . '</p>';
                            echo '<p>' . $info3 . '</p>';
                            echo '</div>';
                            echo '</td></tr>' ;
                        } else {
                            echo '<td>';
                            echo '<div class="styled-box">';
                            echo 'cette reference est en attente de validation';
                            echo '<p>' . $info1 . '</p>';
                            echo '<p>' . $info2 . '</p>';
                            echo '<p>' . $info3 . '</p>';
                            echo '</div>';
                            echo '</td></tr>' ;
                        }
                    }
                }
            }
            if($i%2 == 0){
                echo'</tr>';
            }
            echo '</table>';
            ?>
            <div class="row">
                <input type="submit" value="Valider" style="float: right;">
            </div>
        </div>
    </form>
</body>

</html>
