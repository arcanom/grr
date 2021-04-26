<?php
require 'phpmailer2/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.laposte.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'projetlegrand@laposte.net';                 // SMTP username
$mail->Password = 'Legrand62';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('projetlegrand@laposte.net', 'Projet Legrand');
$mail->addAddress('alexandreleclercq62400@gmail.com', 'Destinataire du Message');     // Add a recipient
$mail->addAddress('projetlegrand@laposte.net');               // Name is optional
$mail->addReplyTo('alexandreleclercq62400@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Mot de passe temporaire';
$mail->Body    = 'Veuillez trouvez ci joint votre mot de passe temporaire';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}