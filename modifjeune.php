<?php
    function is_session_started()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }
    
    if ( is_session_started() === FALSE ) session_start();
?>
<!DOCTYPE html>
<html id="jeune">

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>

<body>
<body id="jeune_signin">
    <script>
        // Vérifier si le paramètre 'error' est présent dans l'URL et a une valeur de 1
        var urlParams = new URLSearchParams(window.location.search);
        var errorParam = urlParams.get('error');
        if (errorParam === '2') {
            // Afficher le message d'erreur
            window.onload = function() {
                alert("Tous les champs ne sont pas valides. Veuillez recommencer");
            };
        }
    </script>
<div id="page_head">
    <img id="logojeunes" src="./img/logojeunes.PNG">
    <p id="module">
        JEUNE
    </p>

    <p id="tagline">
        Mon Compte
    </p>
</div>

<table id="navbar" style="width: 50%;">
    <tr>


        <td style="width: 50%;">
            <a class="active_jeune"> &nbsp; JEUNE &nbsp;</a>
        </td>
        <td style="width: 50%">RÉFÉRENT</td>
            <td style="width: 50%">CONSULTANT</td>
        <td style="width: 50%;">
            <a href="partenaires.html">PARTENAIRES</a>
        </td>


    </tr>
</table>

     <br><br>

    <form id="main" class="main_input" action="modifjeune2.php" method="POST">
        <fieldset>
            <div class="input_text">
                <input type="text" class="writing" name="name" placeholder="Nom" value=<?php echo $_SESSION['name']; ?> onfocus="this.value" /> 
                <label for="name" class="text_label">Nom</label>
                <br><br>
                </div>
                <div class="input_text">
                <input type="text" class="writing" name="fname" placeholder="PRENOM" value=<?php echo $_SESSION['fname']; ?> />
                <label for="fname" class="text_label">Prenom</label> <br><br>
                </div>
                <div class="input_text">
                <input type="date" class="writing" name="birthday" placeholder="Date de naissance" value=<?php echo $_SESSION['birthday']; ?> /> 
                <label for="birthday" class="text_label">Date de naissance</label><br><br>
                </div>
                <div class="input_text">
                <input type="email" class="writing" name="email" placeholder="Mail" value=<?php echo $_SESSION['email']; ?>  READONLY/> 
                <label for="email" class="text_label">Mail</label><br> <br>
                </div>
                <div class="input_text">
                <input type="password" class="writing" name="password" placeholder="Password"value=<?php echo $_SESSION['password']; ?> />
                <label for="password" class="text_label">Mot de passe</label><br><br>
                </div>
        </fieldset>
        
        <br>
        <button type="submit" value="modifj">Valider</button>
    </form>

</body>

</html>
