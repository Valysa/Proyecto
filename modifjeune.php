<?php
$mail = $_POST["email"];
$row = 1;
$test = 1;
if ($mail == "" || $_POST["password"] == "" || $_POST["name"] == "" || $_POST["fname"] == "" || $_POST["birthday"] == ""){
    echo "Tous les champs ne sont pas valides";
    $test = 0;
}
if ($test == 1){
    $password = $_POST["password"];
    echo hash('sha256', '962Crystal');
    $hasedPassword = hash('sha256', $password);
    $fname = $_POST["fname"];
    $name = $_POST["name"];
    $birthdate = $_POST["birthday"];
    $list = array (
    array($fname, $name, $birthdate, $mail, $hasedPassword)
    );
    $fp = fopen('BDD/'.$mail[0].'.csv', 'a+');
    file_put_contents("BDD/'.$mail[0].'.csv", str_replace("", "", file_get_contents("BDD/'.$mail[0].'.csv")));
    fclose($fp);
}
?>