<?php
session_start();
echo $_SESSION['ID']; 
$handle = fopen('BDD2/reference.csv', "a+");
$id = fgetcsv($handle, 1000, ",");
echo $id[0];
$id[0]++;
fclose($handle);
$handle = fopen('BDD2/reference.csv', "cÒ+");
fseek($handle, 0);
fwrite($handle, $id[0] . PHP_EOL);
fclose($handle);
echo $_POST["exp"];
$exp = $_POST["exp"];
$name = $_POST["name"];
$fname = $_POST["fname"];
$mail = $_POST["mailref"];
$list = array(
    array($exp, $name, $fname, $mail)
);
$fp = fopen('BDD2/reference.csv', 'a+');
fwrite($fp, $id[0] . ',');
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
?>