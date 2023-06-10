<?php    
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">


</head>

<body id="jeune_signin">
    <script>
        // Vérifier si le paramètre 'error' est présent dans l'URL et a une valeur de 1
        var urlParams = new URLSearchParams(window.location.search);
        var errorParam = urlParams.get('error');
        if (errorParam === '1') {
            // Afficher le message d'erreur
            window.onload = function() {
                alert("Une erreur s'est produite lors de la validation du compte.");
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



            <td class="active">
                <div>JEUNE</div>
            </td>
            <td><div>RÉFÉRENT</div></td>
            <td><div>CONSULTANT</div></td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>

     <br><br>

<form id="main" class="main_input" action="login.php" method="POST">
        <fieldset>
            <div class="input_text">
            <input class="writing" type="email" name="email" placeholder="Mail" />
            <label for="email" class="text_label">Mail</label><br><br>
        </div>
        <div class="input_text">
            <input class="writing" type="text" name="password" placeholder="Mot de passse" />
            <label for="password" class="text_label">Mot de passe</label><br><br>
        </div>
           
        </fieldset>
        
        
        <button type="submit" value="loginj">Valider</button>
    </form>

</body>
</html>
