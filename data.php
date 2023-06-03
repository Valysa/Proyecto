<?php
session_start();
$_SESSION['name']=$_POST["name"];
$_SESSION['fname']=$_POST["fname"];
$_SESSION['email']=$_POST["email"];
$_SESSION['birthday']=$_POST["birthday"];
$_SESSION['password']=$_POST["password"];
echo $_SESSION['name'];

$mail = $_POST["email"];
$row = 1;
$test = 1;
if ($mail !== "" && $_POST["password"] !== "" && $_POST["name"] !== "" && $_POST["fname"] !== "" && $_POST["birthday"] !== ""){
    if (($handle = fopen('BDD/'.$mail[0].'.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($mail == $data[3]){
                echo "compte déjà existant" ;
                $test = 0;
            }
        }
    }
}
else{
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
    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }
    fclose($fp);
}
?>
