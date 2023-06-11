<?php
    session_start();
    session_unset();
    session_destroy();
    echo "Vous avez été déconnecté";
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>


<body id="validRef">
    <div id="page_head">
        <img id="logojeunes" src="./img/logojeunes.PNG">
        <p id="module">
            JEUNE
        </p>
       
    </div>

    <table id="navbar" style="width: 50%;">
        <tr>


            <td class="active">
                <div>JEUNE</div>
            </td>
           <td><a href="./referent.php"><div>RÉFÉRENT</div></a></td>
            <td><a href="./consultant.php"><div>CONSULTANT</div></td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>
<img id="bg-image" src="./img/jeunesbg.PNG">
<p>
    Vous vous êtes bien déconnecté
</p>
<a href="./accueil.html">
<div id="a">
    Retour à l'accueil
</div>
</a>


</body>

</html>
