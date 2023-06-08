<?php
    session_start();
    $mail = $_SESSION['email'];
    $row = 1;
    $test = 1;
    $j = 0;
    $count = 0;
    $c ='a';
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
        echo $_SESSION['fname'];
        echo $_POST["fname"];
        echo $_SESSION['ID'];
        echo ".....";
        $i = substr($_SESSION['ID'], -1);
        echo $i;
        fseek($fp, 0);
        $c=fgetc($fp); 
        while($j != 1){
            while($c != PHP_EOL){
                ++$count;
                fseek($fp, $count);
                $c=fgetc($fp); 
            }
            ++$count;
            ++$count;
            fseek($fp, $count);
            $c=fgetc($fp); 
            if($c == $i){
                $j = 1;
            } 
        }

        //replacing information in the database 
        file_put_contents("BDD/$mail[0].csv", preg_replace('/'.$_SESSION['fname'].'/', $_POST["fname"], file_get_contents("BDD/$mail[0].csv"), 1));
        file_put_contents("BDD/$mail[0].csv", preg_replace('/'.$_SESSION['name'].'/', $_POST["name"], file_get_contents("BDD/$mail[0].csv"), 1));
        file_put_contents("BDD/$mail[0].csv", preg_replace('/'.$_SESSION['birthday'].'/', $_POST["birthday"], file_get_contents("BDD/$mail[0].csv"), 1));
        file_put_contents("BDD/$mail[0].csv", preg_replace('/'.$_SESSION['hidden_password'].'/', $hasedPassword, file_get_contents("BDD/$mail[0].csv"), 1));
        fclose($fp);

        //info update
        $_SESSION['name'] = $_POST["name"];
        $_SESSION['fname'] = $_POST["fname"];
        $_SESSION['birthday'] = $_POST["birthday"];
        $_SESSION['password'] = $_POST["password"];
        $_SESSION['hidden_password'] = $hasedPassword;
    }
?>