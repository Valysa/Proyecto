<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>

<body id="referent">
    <?php
    echo "REF = " . $_GET['ref'];
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
            $_SESSION["referentName"] = $row[3]; // Première colonne du CSV
            $_SESSION["referentfName"] = $row[2]; // Deuxième colonne du CSV
            $_SESSION["referenceName"] = $row[1]; // Troisième colonne du CSV
            echo '<p>' . $_SESSION["referentName"] . '</p>';
            echo '<p>' . $_SESSION["referentfName"] . '</p>';
            echo '<p>' . $_SESSION["referenceName"] . '</p>';
            echo '</div>';
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
                <td style="width: 50%">
                    <a href="./signup.html">JEUNE</a>
                </td>
                <td style="width: 50%;">
                    <a href="./partenaires.html">PARTENAIRES</a>
                </td>
            </tr>
        </table>
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
                            <form id="skills" action="validateReference.php" method="POST">
                                <div id="Be2">Je confirme sa(son)*</div>
                                <div id="sglcheckbox">
                                    <input type="checkbox" name="selfsufficient">
                                    <label for="selfsufficient">Ponctualité</label>
                                    <br>
                                    <input type="checkbox" name="rational">
                                    <label for="rational">Confiance</label>
                                    <br>
                                    <input type="checkbox" name="attentive">
                                    <label for="attentive">Sérieux</label>
                                    <br>
                                    <input type="checkbox" name="organised">
                                    <label for="organised">Honnêteté</label>
                                    <br>
                                    <input type="checkbox" name="passionated">
                                    <label for="passitionated">Passionné</label>
                                    <br>
                                    <input type="checkbox" name="reliable">
                                    <label for="reliable">Bienveillance</label>
                                    <br>
                                    <input type="checkbox" name="patient">
                                    <label for="patient">Respect</label>
                                    <br>
                                    <input type="checkbox" name="responsible">
                                    <label for="responsible">Juste</label>
                                    <br>
                                    <input type="checkbox" name="Sociable">
                                    <label for="Sociable">Impartial</label>
                                    <br>
                                    <input type="checkbox" name="Optimistic">
                                    <label for="Optimistic">Travail</label>
                                </div>
                                <script>
                                    function limitCheckBox() {
                                        var checkboxgroup = document.getElementById('sglcheckbox').getElementsByTagName("input");
                                        var limit = 4;
                                        for (var i = 0; i < checkboxgroup.length; i++) {
                                            checkboxgroup[i].onclick = function () {
                                                var checkedcount = 0;
                                                for (var i = 0; i < checkboxgroup.length; i++) {
                                                    checkedcount += (checkboxgroup[i].checked) ? 1 : 0;
                                                }
                                                if (checkedcount > limit) {
                                                    this.checked = false;
                                                }
                                            }
                                        }
                                    }
                                    limitCheckBox()
                                </script>
                                <br>
                            </form>
                            <div id="fourMax"> *faire 4 choix maximum</div>
                        </td>
                    </tr>
                </table>
                <button type="submit" style="margin-left: 50%;">Valider</button>
            </form>
        </div>
    </div>
</body>
</html>