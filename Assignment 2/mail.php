<?php

// Change PATH as per your PC !!
include '/home/ashwin/vendor/phpmailer/phpmailer/src/PHPMailer.php';
include '/home/ashwin/vendor/phpmailer/phpmailer/src/SMTP.php';
include '/home/ashwin/vendor/phpmailer/phpmailer/src/Exception.php';

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
 
    $mail->setFrom('ashwintemp2105@gmail.com', 'Ashwin Ginoria');
    $mail->addAddress('ashwinginoria@gmail.com', 'Ashwin Ginoria');
    
    // Add Reply to -_-
    // $mail->addReplyTo('noreply@gmail.com', 'noreply');
    
    // Adding Carbon Copy
    //$mail->addCC('cc@example.com');
    // Adding Blind Carbon Copy
    //$mail->addBCC('bcc@example.com');
 
    //Attachments
    //$mail->addAttachment('/backup/myfile.tar.gz');
 
    //Content
    $mail->isHTML(true); 
    $mail->Subject = 'Form details below';
    $mail->Body    = 
    "First Name: {$_POST["FirstName"]} <br>".
    "Last Name: {$_POST["LastName"]} <br>".
    "Email: {$_POST["Email"]} <br><br>".
    "Telephone: {$_POST["Phone"]} <br>".
    "Comments: {$_POST["Comments"]}";
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}