<?php
$password = $_POST["password"];
echo hash('sha256', '962Crystal');
$hasedPassword = hash('sha256', $password);
$fname = $_POST["fname"];
$name = $_POST["name"];
$birthdate = $_POST["birthday"];
$mail = $_POST["email"];
$list = array (
   array($fname, $name, $birthdate, $mail, $hasedPassword)
);

$fp = fopen('BDD/'.$mail[0].'.csv', 'w');
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
?>
