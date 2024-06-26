<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';


/**
 * @param mixed $mailSubject
 * @param mixed $mailBody
 * @param mixed $recipient
 * 
 * @return [type]
 * 
 * Envoi un mail via PHPMailer
 */
function sendMail($mailSubject, $mailBody, $recipient)
{
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        // $mail->isSMTP();                                         //Send using SMTP
        $mail->Host       = '';                   //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';             //SMTP username
        $mail->Password   = '####';                                 //SMTP password
        $mail->SMTPSecure = 'TLS';                                  //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('', '');
        $mail->addAddress($recipient);                              //Add a recipient
        // $mail->addAddress('ellen@example.com');                  //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');            //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       //Optional name

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = $mailSubject;
        $mail->Body    = $mailBody;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();
    } catch (Exception $e) {
        $msg['mail'] = 'Erreur lors de l\'envoi';
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
