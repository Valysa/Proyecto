<?php
    $mail = "clement.lecoadou@gmail.com";
    echo $mail;
    $ligne = 1; // compteur de ligne
    $fic = fopen("BDD/c.csv", "a+");
    while($tab=fgetcsv($fic,1024,',')){
        $champs = count($tab);//nombre de champ dans la ligne en question
        echo " Les " . $champs . " champs de la ligne " . $ligne . " sont : ";
        $ligne ++;
        //affichage de chaque champ de la ligne en question
        for($i=0; $i<$champs; $i ++) {
            if(strcmp($tab[$i], $mail) == 0){
                $_SESSION['email']=$tab[$i];
                $_SESSION['hidden_password']=$tab[$i+1];
                $_SESSION['birthday']=$tab[$i-1];
                $_SESSION['name']=$tab[$i-2];
                $_SESSION['fname']=$tab[$i-3];
                $_SESSION['ID']=$tab[$i-4];
            }
        }
        echo $_SESSION['email'], $_SESSION['hidden_password'];
    }
?>