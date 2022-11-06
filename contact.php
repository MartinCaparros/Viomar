<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'martincaparross@gmail.com';
$mail->Port = 465;
$mail->SMPTSecure = PHPMailer::ENCRYPTION_STMPS;
$mail->SMTPAuth = true;
$mail->Username = 'martincaparross@gmail.com';
$mail->Password = 'Cartuchera155';
$mail->setFrom('martincaparross@gmail.com', 'Martin Caparros');

try {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $departamento = "";
    $visitor_message = "";
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['departamento'])) {
        $departamento = filter_var($_POST['departamento'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
    if($departamento == "sales") {
        $recipient = "martincaparross@gmail.com";
    }
    else if($departamento == "RRHH") {
        $recipient = "losadaagostina@gmail.com";
    }
    else if($departamento == "customer_services") {
        $recipient = "losadaagostina@gmail.com";
    }
    else {
        $recipient = "losadaagostina@gmail.com";
    }
     
    $headers  = 'From: ' . $visitor_email . "\r\n" . 'Reply-to:`' . $recipent . '\r\n' . 'X-Mailer: PHP/' . phpversion();
     
    $mail->addReplyTo($visitor_email, $visitor_name);
    $mail->addAddress($recipent);
    $mail->Subject = $email_title;
    $mail->AltBody = $visitor_message;

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        
    }


} catch (Exception $e) {

};
?>