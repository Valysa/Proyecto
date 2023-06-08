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
$mail = $_POST["mailref"];
$list = array(
    array($exp, $name, $fname, $mail, $_SESSION['ID'])
);
// insertion des champs dans BDD2
$fp = fopen('BDD2/reference.csv', 'a+');
fwrite($fp, $id[0] . ',');
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
// double chainage (insertion de l'id de la référence dans la table du jeune)

    //part to sent an email to the referent
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
        echo 'Thank you! An email has been sent to the referent.'; 
    }  catch (Exception $e) { 
        echo 'Oops! An error occurred while sending the email: ' . $mail->ErrorInfo; 
    }
?>
