<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

require 'config.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = SENDER_EMAIL_ID;                 // SMTP username
    $mail->Password = SENDER_EMAIL_PASSCODE;                           // SMTP password
    $mail->SMTPSecure = SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = SMTP_PORT;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom(SENDER_EMAIL_ID, SENDER_NAME);

    $recipients = explode(',', RECIPIENT_EMAIL_ID);
    foreach($recipients as $email => $name)
    {
        $mail->addAddress($name);     // Add a recipient
    }    
    $mail->addReplyTo(SENDER_EMAIL_ID, SENDER_NAME);

    $attachments = explode(',', ATTACHMENT_FILES);
    foreach($attachments as $file => $name)
    {
        //Attachments
        $mail->addAttachment(ATTACHMENT_PATH . '/' . $name);         // Add attachments
    } 

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = EMAIL_SUBJECT;
    $mail->Body    = EMAIL_BODY;
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}