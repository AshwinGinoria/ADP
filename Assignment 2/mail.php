<?php

// Change PATH as per your PC !!
include '/home/ashwin/vendor/phpmailer/phpmailer/src/PHPMailer.php';
include '/home/ashwin/vendor/phpmailer/phpmailer/src/SMTP.php';

// Using PHPMailer Namespace as specified PHPMailer developers
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true); 
try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ashwintemp2105@gmail.com';
    $mail->Password = 'vyomchutiyahai';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
 
    $mail->setFrom('ashwintemp2105@gmail.com', 'Admin');
    $mail->addAddress('ashwinginoria@gmail.com', 'Ashwin');
    $mail->addReplyTo('noreply@gmail.com', 'noreply');
    
    // Adding Carbon Copy
    //$mail->addCC('cc@example.com');
    // Adding Blind Carbon Copy
    //$mail->addBCC('bcc@example.com');
 
    //Attachments
    //$mail->addAttachment('/backup/myfile.tar.gz');
 
    //Content
    $mail->isHTML(true); 
    $mail->Subject = 'Test Mail Subject!';
    $mail->Body    = 'This is SMTP Email Test';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}