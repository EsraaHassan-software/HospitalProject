<?php
include_once 'IObserver.php';

require_once('../../PHPMailer/PHPMailerAutoload.php');

class NewPatientMailer implements IObserver
{

    function onPatientAdded($name)
    {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->SMTPAuth = true;
            $mail->Mailer='smtp';// Send using SMTP
            $mail->SMTPSecure = 'tls';
            // Send using SMTP
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Host       = 'smtp.mailtrap.io';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 2525;
            $mail->isHTML();// Set the SMTP server to send through
            $mail->Username   = 'b8143aaa572218';                     // SMTP username
            $mail->Password   = '0626840fb7c9b5';                               // SMTP password

            //Recipients
            //$mail->setFrom('smtp.mailtrap.io');
            $mail->Subject = 'new patient';
            $mail->Body    = 'New patient added: '.$name;
            $mail->addAddress('esraa.shaza@habiba.mai');


            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}