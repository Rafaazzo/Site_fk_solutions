<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require 'vendor/autoload.php';

$nome = $_POST['name'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
  
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'scooby2030.santos@gmail.com';                     // SMTP username
    $mail->Password   = 'henmaxqiv1006';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
   
    $mail->setFrom('scooby2030.santos@gmail.com', 'Rafael');
    $mail->addAddress('scooby2030.santos@gmail.com', 'Information');     // Add a recipient 
    $mail->addReplyTo($email, $nome);

    // Content
 
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = 'O '.$nome.' deseja solicitar uma mensagem ';
  

    $mail->send();
    header('Location: index.html?');
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header('Location: index.php?send=error');
}