<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>


<body id="createRef">
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
            <td><a href="./referent.php"><div>RÉFÉRENT</div></a></td>
            <td><a href="./consultant.php"><div>CONSULTANT</div></td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>
    <img id="bg-image" src="./img/jeunesbg.PNG">
<td>
    <form action=<?php echo "consultantID.php?".$_SERVER['QUERY_STRING']?> method="POST">
        <table id="ref"> <tr>
    <div class="input_text2">
        <label for="mailref" class="text_label">Mot de passe</label>
        <input class="writing" type="password" name="password" placeholder="password" />
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
