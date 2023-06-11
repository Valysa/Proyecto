<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function is_session_started()
     {
         if ( php_sapi_name() !== 'cli' ) {
             if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                 return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
             } else {
                 return session_id() === '' ? FALSE : TRUE;
             }
         }
         return FALSE;
     }

     /*if(!isset($_SESSION["ID"])){
        header("Location: accueil.html");
        exit;
    }*/
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
/*$name = $_POST["name"];
$email = $_POST["mailref"];
$subject = $_POST["subject"];
$message = $_POST["message"];*/
$subject = "Demande de reference";
$message = "Un jeune souhaite partager ses références avec vous. Cliquez sur le lien suivant pour en savoir plus : ";
$link = "localhost:8080/consultant.php?";
// Vérifier si au moins la premiere ref est présente dans l'url
if (!empty($_GET["ref1"])) {
    $n = 1 ;
    //création du lien
    while (!empty($_GET["ref".$n])){
        if($n != 1){
            $link .= "&";
        }
        $link .= "ref"."$n"."=".$_GET["ref".$n];
        $n++;
    }
    $message = rtrim($message, "&");
    // Ajouter le lien au message
    $message .= $link;
} else {
    echo "Aucune référence n'a été spécifiée.";
    header('consult.php?error=1');
}
/*$email = $_POST["mailref"];*/
$email = "jules.belletre@gmail.com";
$mail = new PHPMailer(true);
$password = hash('sha256', $_SESSION['ID'].$_GET["ref".$n]);
$message .= "  Veuillez vous identifier avec le mot de passe suivant : ".$password ;
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
    echo 'Thank you! An email has been sent to the client.'; 
}  catch (Exception $e) { 
    echo 'Oops! An error occurred while sending the email: ' . $mail->ErrorInfo; 
}
//echo $message;
?>
