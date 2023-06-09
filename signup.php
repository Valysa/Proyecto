<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>

<body id="jeune_signin">
    <div id="page_head">
        <img id="logojeunes" src="./img/logojeunes.PNG">
        <p id="module">
            JEUNE
        </p>

        <p id="tagline">
            Engage toi!
        </p>
    </div>

        <table id="navbar" style="width: 50%;">
        <tr>


            <td style="width: 25%;">
                <a class="active_jeune"> &nbsp; JEUNE &nbsp;</a>
            </td>
            <td style="width: 25%">RÉFÉRENT</td>
        <td style="width: 25%">CONSULTANT</td>
            <td style="width: 25%;">
                <a href="login.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>

    <br><br>

    <form id="info" class="main_input" action="data.php" method="POST">
        <fieldset>
            <div class="input_text2">
            <label for="name" class="text_label">Nom:</label>
                <input class="writing" type="text" name="name" placeholder="Nom" />
                <br><br>
            </div>
            <div class="input_text2">
            <label for="fname" class="text_label">Prenom:</label>
                <input class="writing" type="text" name="fname" placeholder="PRENOM" />
                <br><br>
            </div>
            <div class="input_text2">
            <label for="birthday" class="text_label">Date de naissance:</label>
                <input class="writing" type="date" name="birthday" placeholder="Date de naissance" />
                <br><br>
            </div>
            <div class="input_text2">
            <label for="email" class="text_label">Mail:</label>
                <input class="writing" type="email" name="email" placeholder="Mail" />
                <br><br>
            </div>
            <div class="input_text2">
            <label for="password" class="text_label">Mot de passe:</label>
                <input class="writing" type="password" name="password" placeholder="Mot de passe" />
                <br><br>
            </div>
            <?php 
            if(isset($_GET['error']) && $_GET["error"] == 1){
                echo "Certains champs ne sont pas bons";
            }
            ?>
        </fieldset>

        <table>
            <button type="submit" value="loginj">Valider</button>
            <br>
            <br>
        </table>

        <a href="loginAffichage.php">
            <button type="button">Déjà inscrit?</button>
        </a>
    </form>

</body>

</html>
