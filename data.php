<?php
$mail = $_POST["email"];
$row = 1;
if (($handle = fopen('BDD/'.$mail[0].'.csv', "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($mail == $data[3]){
            echo "compte déjà existant chacal" ;
            $test = 0;
        }
        else {
            $test = 1;
        }
    }
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
}

$fp = fopen('BDD/'.$mail[0].'.csv', 'a+');
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
?>
