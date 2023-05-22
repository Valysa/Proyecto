<?php
$mail = $_POST["email"];
$row = 1;
if (($handle = fopen('BDD/'.$mail[0].'.csv', "r")) !== FALSE) {
    for ($i=0; $i<4 ; $i++){
        $data = fgetcsv($handle, 1000, ",");
    }
    fclose($handle);
}


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
?>
