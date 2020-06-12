<?php
//include("include/config.php");
session_start();
include_once("database.php");
require_once('../../PHPMailer/PHPMailerAutoload.php');
class loginModel
{
    public function login($email, $password)
    {
        $d1= Database::GetInstance();
        $ret=mysqli_query($d1->GetConnection(),"SELECT * FROM doctors WHERE docEmail='$email' and password='$password'");
        $num=mysqli_fetch_array($ret);
        return $num;
    }

    public function check_token($token) {
        $d1= Database::GetInstance();
        $ret=mysqli_query($d1->GetConnection(),"SELECT * FROM `tokens` WHERE `token`='$token' ");
        return $ret;
    }

    public function forgot_password($email){

        $d1= Database::GetInstance();
        $ret=mysqli_query($d1->GetConnection(),"SELECT * FROM doctors WHERE docEmail='$email' ");
        //$num=mysqli_fetch_array($ret);
        $emailExists=false;
        while ($row = mysqli_fetch_array($ret)) {
            $emailExists = true;
        }
        if($emailExists) {
            $date = date("Y-m-d H:i:s");
            $expire = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($date)));;
            $token = md5(uniqid(rand(), true));
            $sql="INSERT INTO `tokens`(`email`, `token`, `created_at`, `expired_at`) VALUES ('$email','$token','$date','$expire')";
            $ret=mysqli_query($d1->GetConnection(), $sql);



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
                $mail->Subject = 'reset password';
                $mail->Body    = 'Please click <a href="http://localhost/hospital/hms/doctor/controller/login-controller.php?token='.$token.'">here</a> to reset your password. ';
                $mail->addAddress($email);


                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }



        }
        return $emailExists;

    }

    public function reset_password($password){
        $email=$_SESSION['email_reset'];
        $d1= Database::GetInstance();
        $ret=mysqli_query($d1->GetConnection(),"update doctors set password='$password' WHERE docEmail='$email' ");
        $ret=mysqli_query($d1->GetConnection(),"UPDATE `tokens` SET `available`=0 WHERE `email` = '$email' ");
        return $ret;
    }
}
