<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage CSV</title>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>
<body id="consult">
<?php
function is_session_started()
{
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? true : false;
        } else {
            return session_id() === '' ? false : true;
        }
    }
    return false;
}

if (is_session_started() === false) {
    session_start();
}
if (!isset($_SESSION["ID"])) {
    header("Location: accueil.html");
    exit;
}
?>
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
        <td class="active">
            <div>JEUNE</div>
        </td>
        <td><a href="./referent.php"><div>RÉFÉRENT</div></a></td>
            <td><a href="./consultant.php"><div>CONSULTANT</div></td>
        <td>
            <a href="./partenaires.html">PARTENAIRES</a>
        </td>
    </tr>
</table>
<img id="bg-image" src="./img/jeunesbg.PNG">
<form action=
<?php 
echo "inputconsultantname.php?ref1=";
$n=2 ;
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
    <div class="container">
        <div class="row">
            <input type="submit" name="valider" value="Valider" style="float: left;">
        </div>
    </div>
</form>
<form action=
<?php 
echo "generatePDF.php?ref1=";
$n=2 ;
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
?>
 method="POST">
<div class="container">
        <div class="row">
            <input type="submit" name="generer_pdf" value="Générer PDF" style="float: right;">
        </div>
    </div>
</body>
</html>

