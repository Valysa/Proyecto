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
            CONSULTANT
        </p>
        <p id="tagline">
            Je donne de la valeur à mon engagement
        </p>
    </div>

    <table id="navbar" style="width: 50%;">
        <tr>


            <td>
                <div><a href="./signup.php">JEUNE</a></div>
            </td>
            <td>
                <div>RÉFÉRENT</div>
            </td>
            <td class="active">
                <div>CONSULTANT</div>
            </td>
            <td>
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>

    <form action="inputconsultantname.php" method="POST">
        <div class="container">
            <?php
            //récupere les références dans la base de donnée 
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
            echo '<table id="references">';
            $test = 0;
            foreach ($data as $row) {
                $n = 1;
                while (!empty($_GET["ref" . $n])) {
                    if ($row[0] == $_GET["ref" .$n]) {
                        if($test == 0){ // pour la premiere séléctionnée, récupere l'id du jeune
                            $idjeune = $row[5];
                            $test =1;
                        }
                        $info1 = $row[3]; // Première colonne du CSV
                        $info2 = $row[2]; // Deuxième colonne du CSV
                        $info3 = $row[1]; // Troisième colonne du CSV
                        echo '<tr><td>';
                        echo '<div class="validated"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        echo '</td></tr></table></div>';
                        echo '</td>';
                    }
                    $n++ ;
                }
            }
            echo '</table>';
            $file = fopen('BDD/'.$idjeune[0].'.csv', 'r');
            while (($row = fgetcsv($file, 1000, ',')) !== false) {
                if (!$firstLineSkipped) {
                    $firstLineSkipped = true;
                    continue; // Ignore la première ligne du CSV
                }
                $data[] = $row;
            }
            foreach ($data as $row) {
                if($row[0] == $idjeune){
                    echo '
        <fieldset>
            <div class="input_text">
                <input type="text" class="writing" name="name" placeholder="Nom" value= '.$row[1].' onfocus="this.value" READONLY/> 
                <label for="name" class="text_label">Nom</label>
                <br><br>
                </div>
                <div class="input_text">
                <input type="text" class="writing" name="fname" placeholder="PRENOM" value= '.$row[2].' READONLY/>
                <label for="fname" class="text_label">Prenom</label> <br><br>
                </div>
                <div class="input_text">
                <input type="date" class="writing" name="birthday" placeholder="Date de naissance" value= '.$row[3].' READONLY/> 
                <label for="birthday" class="text_label">Date de naissance</label><br><br>
                </div>
                <div class="input_text">
                <input type="email" class="writing" name="email" placeholder="Mail" value = '.$row[4].'  READONLY/> 
                <label for="email" class="text_label">Mail</label><br> <br>
                </div>
                <div class="input_text">
        </fieldset>';
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