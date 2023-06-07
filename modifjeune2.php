<?php
    session_start();
    $mail = $_SESSION['email'];
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
        $fp = fopen("BDD/$mail[0].csv", 'a+');
        //file_put_contents("BDD/'.$mail[0].'.csv", str_replace("$_SESSION['name'], $_SESSION['fname'], $_SESSION['birthday'], $_SESSION['email'], $_SESSION['hidden_password']", "$_POST["name"], $_POST["fname"], $_POST["email"], $_POST["birthday"], $hasedPassword", file_get_contents("BDD/'.$mail[0].'.csv")));
        echo $_SESSION['fname'];
        echo $_POST["fname"];
        echo $_SESSION['ID'];
        //fseek(fp, i++);
        file_put_contents("BDD/$mail[0].csv", preg_replace('/'.$_SESSION['fname'].'/', $_POST["fname"], file_get_contents("BDD/$mail[0].csv"), 1));
        fclose($fp);
    }
?>