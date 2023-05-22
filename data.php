<?php
$mail = $_POST["email"];
$row = 1;
if (($handle = fopen('BDD/'.$mail[0].'.csv', "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
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
