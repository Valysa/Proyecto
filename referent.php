<?php
    session_start();
    echo $_SESSION['ID']; 
    $handle = fopen('BDD2/reference.csv', "a+");
    $id = fgetcsv($handle, 1000, ",");
    echo $id[0];
    $id[0]++;
    fclose($handle);
    $handle = fopen('BDD2/reference.csv', "cÒ+");
    fseek($handle, 0);
    fwrite($handle, $id[0] . PHP_EOL);
    fclose($handle);
    echo $_POST["exp"];
    // liste des champs à rentrer dans la database
    $exp = $_POST["exp"];
    $name = $_POST["name"];
    $fname = $_POST["fname"];
    $mailj = $_POST["mailref"];
    if($exp == "" || $name == "" || $fname == "" || $mailj == ""){
        header("Location: createRef.php");
        exit;
    }
    $state = "waiting";
    if($_POST['skill'] != null){
        $skill= $_POST['skill'];
        $count = 0;
        foreach($skill as $a){
            ++$count;
        }
    }
    // insertion des champs dans BDD2
    $fp = fopen('BDD2/reference.csv', 'a+');
    $l = $id[0].','.$exp.','.$name.','.$fname.','.$mailj.','.$_SESSION['ID'].','.$state;
    if($_POST['skill'] != null){
        for ($i = 0; $i<$count; $i++){
            $l = $l.','.$skill[$i];
        }
    }
    $l = $l.PHP_EOL;
    fwrite($fp, $l);
    fclose($fp);
    // double chainage (insertion de l'id de la référence dans la table du jeune)
    $fpj = fopen("BDD/$mailj[0].csv", 'a+');
    $line = $_SESSION['ID']; 
    while($tab=fgetcsv($fpj,1024,',')){
        $champs = count($tab);//nombre de champ dans la ligne en question
        if(strcmp($tab[0], $_SESSION['ID']) == 0){
            for($i=0; $i<$champs-1; $i ++) {
                $line = $line.','.$tab[$i+1]; 
            }
        }
    }
    $newline = $line.','.$id[0]++;
    file_put_contents("BDD/$mailj[0].csv", preg_replace('/'.$line.'/', $newline, file_get_contents("BDD/$mailj[0].csv"), 1));  
    fclose($fpj);


    $id[0]--;
    // Genere le lien
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
    $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
   // $url.= $_SERVER['REQUEST_URI'];    

    $url .= "/referent.php?ref=".$id[0];
    echo $url;
    echo "                     ";
    echo $_SESSION['ID'].$id[0];
    $password = hash('sha256', $_SESSION['ID'].$id[0]);
    
    //part to sent an email to the referent
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $subject="Demande de reference";
    $message="Vous avez reçu une demande de reference, connectez vous à ce lien : ".$url.
    " Veuillez utiliser ce mot de passe une fois sur le site : ".$password;
    $email = $_POST["mailref"]; 
    $mail = new PHPMailer(true);
    echo $message ; 
    /*
    try { 
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'engagementjeunes64@outlook.fr';
        $mail->Password = 'EngJeunes64&';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        
    // Set other email parameters (to, subject, message, headers)
    $mail->setFrom('engagementjeunes64@outlook.fr');

    //destination
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    $mail->send();
        echo 'Thank you! An email has been sent to the referent.'; 
    }  catch (Exception $e) { 
        echo 'Oops! An error occurred while sending the email: ' . $mail->ErrorInfo; 
    }
    /*header("Location: validationref.html");
    exit;*/
?>
