<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    /*$name = $_POST["name"];
    $email = $_POST["mailref"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];*/
    $subject="Demande de reference";
    $message="Vous avez reçu une demande de reference";
    $email = $_POST["mailref"]; 
    $mail = new PHPMailer(true);
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
?>
