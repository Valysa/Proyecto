<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>

<body id="referent">
    <?php
    if(!isset($_SERVER['QUERY_STRING'])){
        header("Location: referent.php");
        exit;
    }
    //test du mot de passe rentré par le référent
    //echo "REF = " . $_GET['ref'];
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
        if ($row[0] == $_GET['ref']) {
            if($_POST["password"] != hash("sha256", $row[5].$row[0])){
                header("Location: referent.php?error=1&ref=".$row[0]);
                exit;
            }
            $_SESSION["referentName"] = $row[3]; // Première colonne du CSV
            $_SESSION["referentfName"] = $row[2]; // Deuxième colonne du CSV
            $_SESSION["referenceName"] = $row[1]; // Troisième colonne du CSV
            for($i=6; $i<11 ; $i++){
                if(isset($row[$i])){
                    $_SESSION["$i"] = $row[$i];
                }
            }
            /*echo '<p>' . $_SESSION["referentName"] . '</p>';
            echo '<p>' . $_SESSION["referentfName"] . '</p>';
            echo '<p>' . $_SESSION["referenceName"] . '</p>';
            echo '</div>';*/
        }
    }
    ?>
    <div id="wrapper" class="wrapper">
        <div id="page_head">
            <img id="logojeunes" src="./img/logojeunes.PNG">
            <p id="module">
                RÉFÉRENT
            </p>
            <p id="tagline">
                Je confirme la valeur de ton engagement
            </p>
        </div>

        <table id="navbar" style="width: 50%;">
            <tr>

            <td>
                <div><a href="./signup.php">JEUNE</a></div>
            </td>
            <td class="active"><div>RÉFÉRENT</div></td>
            <td><a href="./consultant.php"><div>CONSULTANT</div></td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>
                
            </tr>
        </table>
        <img id="bg-image" src="./img/referentsbg.PNG">
        <table style="width: 100%;">
            <p id="description">
                Confirmez cette expérience et ce que vous avez
                pu constater au contact de ce jeune.</p>
        </table>
        <div>
        <form id="info" class="main_input" action="validateReference.php?ref=<?php echo $_GET['ref']; ?>" method="POST">
                <table id="infos" style="width: 100%;">
                    <tr>
                        <td style="width: 25%;">
                            <form id="comment_area">
                                <label for="comments">COMMENTAIRE</label> <br>
                                <textarea type="text" name="comments"></textarea>
                            </form>
                        </td>
                        <td>
                            <fieldset>
                                <div class="input_text">
                                    <input class="writing" type="text" name="name" value="<?php echo $_SESSION["referentName"]; ?>" placeholder="Nom" />
                                    <label for="name" class="text_label">Nom</label><br><br>
                                </div>
                                <div class="input_text">
                                    <input class="writing" type="text" name="fname" value="<?php echo $_SESSION["referentfName"]; ?>" placeholder="PRENOM" />
                                    <label for="fname" class="text_label">Prenom</label><br><br>
                                </div>
                                <div class="input_text">
                                        <input class="writing" type="text" name="referenceName"
                                            value="<?php echo $_SESSION["referenceName"]; ?>"
                                            placeholder="referenceName" />
                                        <label for="fname" class="text_label">Description</label><br><br>
                                    </div>
                                </fieldset>
                        </td>
                        <td style="width: 25%;">
                            <div id="Be">SES SAVOIRS ETRE</div>
                            <?php 
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
                            for($i=7; $i<10 ; $i++){
                                if(isset($_SESSION["$i"])){
                                   echo("$skills[$i]");
                                   echo("<br>");
                                }
                            }
                            ?>
                            <div id="fourMax"></div>
                        </td>
                    </tr>
                </table>
                <button type="submit" style="margin-left: 50%;">Valider</button>
            </form>
            <form id="info" class="main_input" action="validateReference.php?invalide=1&ref=<?php echo $_GET['ref']; ?>" method="POST">
            <button type="submit" style="margin-right: 50%;">Invalider</button>
            </form>
        </div>
    </div>
</body>
</html>
