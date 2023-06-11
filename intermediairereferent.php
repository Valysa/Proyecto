<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>


<body id="intermediairer">
    <div id="page_head">
        <img id="logojeunes" src="./img/logojeunes.PNG">
        <p id="module">
            REFERENTS
        </p>
       
    </div>

    <table id="navbar" style="width: 50%;">
        <tr>
            <td ><a href="./signup">
                <div > &nbsp; JEUNE &nbsp; </div></a>
            </td>
           <td class="active"><div>RÉFÉRENT</div></td>
            <td><a href="./consultant.php"><div>CONSULTANT</div></td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>
    
<td>
    <form action=<?php echo "refID.php?ref=".$_GET["ref"]?> method="POST">
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
