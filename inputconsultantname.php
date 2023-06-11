<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>


<body id="createRef">
<?php
if($_SERVER['QUERY_STRING'] == ""){
    header("Location: consult.html".$_SERVER['QUERY_STRING']);
exit;
}
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
    <?php
        /*if(!isset($_POST["selection"])){
        header(header("Location: consult.php"));
        exit;
        }*/
    ?>
    <div id="page_head">
        <img id="logojeunes" src="./img/logojeunes.PNG">
        <p id="module">
            JEUNE
        </p>
       
    </div>

    <table id="navbar" style="width: 50%;">
        <tr>
            <td class="active">
                <div > &nbsp; JEUNE &nbsp; </div>
            </td>
            <td >RÉFÉRENT</td>
            <td >CONSULTANT</td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>
<td>
    <form action=
    <?php
    //création de l'url spécial sendmailtoconsultant avec les refs 
    echo"sendmailtoconsultant.php?".$_SERVER['QUERY_STRING'];
    ?> method="POST">
        <table id="ref"> <tr>
    <div class="input_text2">
        <label for="mailref" class="text_label">Mail</label>
        <input class="writing" type="email" name="mailref" placeholder="Mail" />
        <br><br>
    </div>
</td><td>
    <button type="submit">Valider</button>
</td>
</tr>
</table>
</form>

</body>

</html>
