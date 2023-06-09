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
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">

</head>

<body id="mySpace">
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
        
        
        <td style="width: 50%">
            <a class="active_jeune"> JEUNE</a>
            </td>
        <td style="width: 50%;">
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>
        
        
    </tr>
</table>
<br><br>

<table id="option" style="width: 100%;">
    <tr>
        <td></td>
    <td>
    <a href="./createRef.html">
        <div>Créer une demande de référence</div>
    </a>
    </td>
    <td></td>
</tr>
    <td></td>
    <td>
    <a href="./modifjeune.php">
        <div>Modifier tes données</div>
    </a>
    </td>
    <td></td>
</tr>
    <td></td>
    <td>
    <a href="./consult.php">
        <div>consulte ta liste de références</div>
    </a>
    </td>
    <td></td>
</tr>
    <td></td>
    <td>
    <a href="./logout.php">
        <div>Se déconnecter</div>
    </a>
    </td>
    <td></td>
</table>
</body>

</html>
