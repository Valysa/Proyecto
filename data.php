<?php
session_start();
$_SESSION['name'] = $_POST["name"];
$_SESSION['fname'] = $_POST["fname"];
$_SESSION['email'] = $_POST["email"];
$_SESSION['birthday'] = $_POST["birthday"];
$_SESSION['password'] = $_POST["password"];
echo $_SESSION['name'];

$mail = $_POST["email"];
$row = 1;
$test = 1;
if ($mail !== "" && $_POST["password"] !== "" && $_POST["name"] !== "" && $_POST["fname"] !== "" && $_POST["birthday"] !== "") {
    if (($handle = fopen('BDD/' . $mail[0] . '.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE || $data != "") {
            if (isset($data) && count($data) > 3 && $mail == $data[3]) {
                echo "compte déjà existant";
                $test = 0;
            }
        }
    }
} else {
    echo "Tous les champs ne sont pas valides";
    $test = 0;
}

if ($test == 1) {

    //récupere l'id
    $handle = fopen('BDD/' . $mail[0] . '.csv', "a+");
    $line = fgetcsv($handle);
    if ($line != "") {
        $firstvalue = $line[0];
        $id = intval($firstvalue) + 1;
        $_SESSION['ID'] = $id;
        echo "\n";
        echo $_SESSION['ID'];
        fclose($handle);
        echo 'val is' . $id;
        $handle = fopen('BDD/' . $mail[0] . '.csv', "c+");
        fseek($handle, 0);
        fwrite($handle, $id . PHP_EOL);
        fclose($handle);
    }

    // cas ou le fichier est initialement vide
    else {
        fwrite($handle, '1' . PHP_EOL);
        $id = 1;
        fclose($handle);
    }

    $password = $_POST["password"];
    echo hash('sha256', '962Crystal');
    $hasedPassword = hash('sha256', $password);
    $_SESSION['hidden_password'] = $hasedPassword;
    echo $_SESSION['hidden_password'];
    $fname = $_POST["fname"];
    $name = $_POST["name"];
    $birthdate = $_POST["birthday"];
    $list = array(
        array($fname, $name, $birthdate, $mail, $hasedPassword)
    );
    $fp = fopen('BDD/' . $mail[0] . '.csv', 'a+');
    fwrite($fp, $id . ',');
    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }
    fclose($fp);
}
?>