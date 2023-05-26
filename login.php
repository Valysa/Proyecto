<?php
$mail = $_POST["email"];
$password = hash('sha256', $_POST["password"]);
$row = 1;
if (($handle = fopen('BDD/'.$mail[0].'.csv', "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($mail == $data[3]){
            if ($password == $data[4]){
                echo $data[3];
            }
            else{
                echo "le mot de passe est pas bon chacal";
            }
        }
    }
    fclose($handle);
}
?>