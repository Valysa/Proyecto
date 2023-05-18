<?php
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    /*$name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];*/
    $subject="Test envoi de mail";
    $message="Salut mec! Test reussi pour envoyer un mail !";
    $email="guyotjulie@cy-tech.fr";  
    $mail = new PHPMailer(true);
    try { 
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'engagementjeunes64@outlook.fr';
        $mail->Password = 'EngJeunes64&';
        $mail->SMTSecure = 'tls';
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
?>
