<?php
session_start();
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

    $ligne = 1; // compteur de ligne
    $fic = fopen("BDD/$mail[0].csv", "a+");
    while($tab=fgetcsv($fic,1024,',')){
        $champs = count($tab);//nombre de champ dans la ligne en question
        for($i=0; $i<$champs; $i ++) {
            if(strcmp($tab[$i], $mail) == 0){
                $_SESSION['email']=$tab[$i];
                $_SESSION['hidden_password']=$tab[$i+1];
                $_SESSION['birthday']=$tab[$i-1];
                $_SESSION['name']=$tab[$i-2];
                $_SESSION['fname']=$tab[$i-3];
                $_SESSION['ID']=$tab[$i-4];
                $_SESSION['password']=$_POST["password"];
            }
        }
    }
echo $_SESSION['ID'];

if($test == 1){
    header("Location: monEspace.php");
}
else{
    header("Location: loginAffichage.php?error=1");
}
?>
