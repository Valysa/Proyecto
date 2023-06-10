<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Affichage CSV</title>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>

<body id="consult">
<div id="page_head">
        <img id="logojeunes" src="./img/logojeunes.PNG">
        <p id="module">
            JEUNE
        </p>
        <p id="tagline">
            Je donne de la valeur à mon engagement
        </p>
    </div>

    <table id="navbar" style="width: 50%;">
        <tr>


            <td class="active">
                <div > JEUNE </div>
            </td>
            <td >RÉFÉRENT</td>
            <td >CONSULTANT</td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>

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
            echo '<table id="references">';
            foreach ($data as $row) {
                if ($row[5] == $_SESSION["ID"]) {
                    $i++;
                    if ($i % 2 == 0) {
                        $info1 = $row[3]; // Première colonne du CSV
                        $info2 = $row[2]; // Deuxième colonne du CSV
                        $info3 = $row[1]; // Troisième colonne du CSV
                        if ($row[6] == "validated") {
                            echo '<tr><td>';
                            echo '<div class="validated"><table><tr><td>';
                            echo '<p>' . $info1 . '</p>';
                            echo '<p>' . $info2 . '</p>';
                            echo '<p>' . $info3 . '</p>';
                            echo '</td><td>';
                            echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                            echo '</td></tr></table></div>';
                            echo '</td>' ;
                        } else {
                            echo '<tr><td>';
                            echo '<div class="unvalidated"><table><tr><td>';
                            echo '<p>' . $info1 . '</p>';
                            echo '<p>' . $info2 . '</p>';
                            echo '<p>' . $info3 . '</p>';
                            echo '</td><td>';
                            echo '<div class="unvalid_msg">cette reference est en attente de validation</div>';
                            echo '</td></tr></table></div>';
                            echo '</td>' ;
                        }
                    }
                    else{
                        $info1 = $row[3]; // Première colonne du CSV
                        $info2 = $row[2]; // Deuxième colonne du CSV
                        $info3 = $row[1]; // Troisième colonne du CSV
                        if ($row[6] == "validated") {
                            echo '<td>';
                            echo '<div class="validated"><table><tr><td>';
                            echo '<p>' . $info1 . '</p>';
                            echo '<p>' . $info2 . '</p>';
                            echo '<p>' . $info3 . '</p>';
                            echo '</td><td>';
                            echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                            echo '</td></tr></table></div>';
                            echo '</td>' ;
                        } else {
                            echo '<td>';
                            echo '<div class="unvalidated"><table><tr><td>';
                            echo '<p>' . $info1 . 'ses</p>';
                            echo '<p>' . $info2 . 'ses</p>';
                            echo '<p>' . $info3 . 'ses</p>';
                            echo '</td><td>';
                            echo '<div class="unvalid_msg">cette reference est en attente de validation</div>';
                            echo '</td></tr></table></div>';
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
