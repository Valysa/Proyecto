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
            <td><a href="./referent.php"><div>RÉFÉRENT</div></a></td>
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
            // Récupérer les références depuis $_GET
            $references = $_GET;
            if (empty($references)) {
                header("Location: consultant.php");
                exit;
            }
            $skills= [
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
            // Récupérer les références dans la base de données
            $file = fopen('BDD2/reference.csv', 'r');
            $data = [];
            $firstLineSkipped = false;
            while (($row = fgetcsv($file, 1000, ',')) !== false) {
                if (!$firstLineSkipped) {
                    $firstLineSkipped = true;
                    continue; // Ignorer la première ligne du CSV
                }
                $data[] = $row;
            }
            fclose($file);

            echo '<table id="references">';
            $test = 0;
            foreach ($data as $row) {
                foreach ($references as $reference) {
                    if ($row[0] == $reference) {
                        if ($test == 0) {
                            // Pour la première sélectionnée, récupérer l'id du jeune
                            $idjeune = $row[5];
                            $test = 1;
                        }
                        $info1 = $row[3]; // Première colonne du CSV
                        $info2 = $row[2]; // Deuxième colonne du CSV
                        $info3 = $row[1]; // Troisième colonne du CSV
                        $info5 = $row[4]; // Cinquième colonne du CSV
                        $info0 = $row[0];
                        echo '<tr><td>';
                        echo '<div class="validated"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        for ($i = 0; $i < 4; $i++) {
                            if (isset($row[7])) {
                                echo $skills[$row[7][$i]];
                                echo "  ";
                            }
                        }
                        echo '</td></tr></table></div>';
                        echo '</td>';
                    }
                }
            }

            $file = fopen('BDD/'.$idjeune[0].'.csv', 'r');
            while (($row = fgetcsv($file, 1000, ',')) !== false) {
                if (!$firstLineSkipped) {
                    $firstLineSkipped = true;
                    continue; // Ignorer la première ligne du CSV
                }
                $data[] = $row;
            }
            fclose($file);

            foreach ($data as $row) {
                if ($row[0] == $idjeune) {
                    echo '
        <fieldset>
            <div class="input_text">
                <input type="text" class="writing" name="name" placeholder="Nom" value="'.$row[1].'" readonly/> 
                <label for="name" class="text_label">Nom</label>
                <br><br>
            </div>
            <div class="input_text">
                <input type="text" class="writing" name="fname" placeholder="Prénom" value="'.$row[2].'" readonly/>
                <label for="fname" class="text_label">Prénom</label> <br><br>
            </div>
            <div class="input_text">
                <input type="date" class="writing" name="birthday" placeholder="Date de naissance" value="'.$row[3].'" readonly/> 
                <label for="birthday" class="text_label">Date de naissance</label><br><br>
            </div>
            <div class="input_text">
                <input type="email" class="writing" name="email" placeholder="Mail" value="'.$row[4].'" readonly/> 
                <label for="email" class="text_label">Mail</label><br> <br>
            </div>
        </fieldset>';
                }
            }
            ?>
            <div class="row">
                <input type="submit" value="Valider" >
            </div>
        </div>
    </form>
</body>

</html>
