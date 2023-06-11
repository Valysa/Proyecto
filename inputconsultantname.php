<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>


<body id="createRef">
    <?php
        if(!isset($_POST["selection"])){
        header(header("Location: consult.php"));
        exit;
        } 
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
    echo"sendmailtoconsultant.php?ref1=";
    $n = 2 ;
    $selectedRows = $_POST["selection"];
    $numSelected = count($selectedRows);
    $count = 0;
    foreach($selectedRows as $selectedRow) {
        if ($count != 0){
            echo '&ref'.$n.'=';
            $n++;
        }
        $count++;
        echo $selectedRow; // Afficher la valeur de $row[0]
    }
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
