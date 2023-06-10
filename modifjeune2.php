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
        
        $ref = '';
        //remplacement des informations dans la base de données
        $fp = fopen("BDD/$mail[0].csv", 'a+');
        $line = $_SESSION['ID']; 
        while($tab=fgetcsv($fp,1024,',')){
            $champs = count($tab);//nombre de champ dans la ligne en question
            if(strcmp($tab[0], $_SESSION['ID']) == 0){
                for($i=0; $i<$champs-1; $i ++) {
                    $line = $line.','.$tab[$i+1];
                    if($i >= 5){
                        $ref = $ref.','.$tab[$i+1];
                    }  
                }
            }
        }
        echo "....";
        echo $ref;
        $newline = $_SESSION['ID'].','.$fname.','.$name.','.$birthdate.','.$mail.','.$hasedPassword.$ref; 
        file_put_contents("BDD/$mail[0].csv", preg_replace('/'.$line.'/', $newline, file_get_contents("BDD/$mail[0].csv"), 1));
        fclose($fp);        

        //info update
        $_SESSION['name'] = $_POST["name"];
        $_SESSION['fname'] = $_POST["fname"];
        $_SESSION['birthday'] = $_POST["birthday"];
        $_SESSION['password'] = $_POST["password"];
        $_SESSION['hidden_password'] = $hasedPassword;

        header("Location: monEspace.php");
        //alert("Les modifications ont été enregistrées");
    }
    else{
        header("Location: modifjeune.php?error=2");
    } 
?>