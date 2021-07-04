<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug   = 2;
//$mail->DKIM_domain = '127.0.0.1';
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host        = "localhost";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port        = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth    = true;
//Username to use for SMTP authentication
$mail->Username    = "care@daisysalons.com";
//Password to use for SMTP authentication
$mail->Password    = "Miku2468";
$mail->SMTPSecure  = 'tls';
//Set who the message is to be sent from
$mail->setFrom($_POST['email'], 'First Last');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('daisys.parlour@gmail.com', 'Arjun');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>