<?php
$mail = $_POST["email"];
$row = 1;
$test = 0;
if (($handle = fopen('BDD/'.$mail[0].'.csv', "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($mail == $data[4]){
            $test = 1;
            $salt = $data[0];
            $password = hash('sha256', $salt.$_POST["password"]);
            echo $password;
            if ($password == $data[5]){
                echo $data[4];
            }
            else{
                echo "le mot de passe est pas bon chacal";
            }
        }
    }
    if($test == 0){
        echo "le mail n'existe sensiblement pas dans la base de donnée";
    }
    fclose($handle);
}
?>
