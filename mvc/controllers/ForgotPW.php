<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ForgotPW extends Controller
{
    public $UserModel;
    function __construct()
    {
        $this->UserModel = $this->model("UserModel");
    }

    public function SayHi()
    {
        $this->view("master2", ["page" => "reset_Password"]);
    }

    public function PasswordReset()
    {
        if (isset($_POST['forget'])) {
            // var_dump($_POST['forget']);


            $userEmail = $_POST['forget'];

            $rowCount = $this->UserModel->checkUserEmail($userEmail);
            // var_dump($rowCount);
            if ($rowCount) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
                    $mail->SMTPAuth   = true;
                    $mail->SMTPSecure = 'ssl';
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->Port       = 465;
                    $mail->Username   = $_ENV['PHPMAIL_NAME'];
                    $mail->Password   = $_ENV['PHPMAIL_PASS'];

                    $mail->setFrom($_ENV['PHPMAIL_NAME'], 'Dandelion');
                    $mail->addAddress('zzsakura2020@gmail.com');


                    $mail->WordWrap = 50;
                    $mail->isHTML(true);
                    $mail->Subject = "Forgot Password";
                    $mail->Body = 'This is the plain text version of the email content';
                    $mail->AltBody = 'This is the plain text version of the email content';

                    // $mail->send();
                    // echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "not ok";
            }

            $this->view("master2", ["page" => "confirm_Sending"]);
        }
    }
}
