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
        if (isset($_POST["forget"]) && isset($_POST["btnReset"])) {
            $userEmail = $_POST['forget'];

            $rowCount = $this->UserModel->GetRow("SELECT * FROM Users WHERE UserEmail = ?", [$userEmail]);

            // var_dump($rowCount["UserFirstName"]);
            if ($rowCount) {
                $token = md5($userEmail) . rand(10, 9999);
                $userName = ucfirst($rowCount["UserFirstName"]);
                //var_dump($userName);

                //echo $token . "<br>";

                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $expFormat = mktime(
                    date("H"),
                    date("i") + 30,
                    date("s"),
                    date("m"),
                    date("d"),
                    date("Y")
                );
                // echo $expFormat;

                $expDate = date("Y-m-d H:i:s", $expFormat);
                //echo $expDate;
                $this->UserModel->UpdateDB("UPDATE Users SET reset_link_token = ?, exp_date = ? WHERE UserEmail = ?", [$token, $expDate, $userEmail]);
                $link = "ct271.test/ForgotPW/PasswordReset/" . rtrim(strtr(base64_encode($userEmail), '+/', '-_'), '=') . "/$token";
                //echo $link;

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
                    $mail->Subject = "Reset Your Dandelion Account Password";

                    $mail->Body = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta name="x-apple-disable-message-reformatting" />
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <meta name="color-scheme" content="light dark" />
                        <meta name="supported-color-schemes" content="light dark" />
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    </head>  
                    <body>
                        <table class="body-wrap"
                            style="box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;"
                            bgcolor="#f6f6f6">
                            <tbody>
                                <tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                    <td class="container" width="600"
                                        style=" box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                                        valign="top">
                                        <div class="content"
                                            style=" box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope=""
                                                itemtype="http://schema.org/ConfirmAction"
                                                style=" box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                                <tbody>
                                                    <tr style="box-sizing: border-box; font-size: 14px; margin: 0;">
                                                        <td class="content-wrap"
                                                            style="box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #67a8e4;border-radius: 7px; background-color: #fff;"
                                                            valign="top">
                                                            <meta itemprop="name" content="Confirm Email"
                                                                style="box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <table width="100%" cellpadding="0" cellspacing="0"
                                                                style="box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                <tbody>
                                                                    <tr style="box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                        <td class="content-block"
                                                                            style="box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                                            valign="top">
                                                                            <h3>Hi ' . $userName . ',</h3>
                                                                        </td>
                                                                    </tr>
                                                                    <tr
                                                                        style="text-align: justify ; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                        <td class="content-block"
                                                                            style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                                            valign="top">
                                                                            You recently requested to reset your password for your account.
                                                                            Click the button below to reset it.
                                                                            <span style="font-weight:bold">
                                                                                This password reset is only valid for the next 30 minutes.
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                        <td class="content-block" itemprop="handler" itemscope=""
                                                                            itemtype="http://schema.org/HttpActionHandler"
                                                                            style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                                            valign="top">
                                                                            <div style="text-align: center;">
                                                                                <a href="' . $link . '" class="btn-primary" itemprop="url"
                                                                                    style=" box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f06292; margin: 0; border-color: #f06292; border-style: solid; border-width: 8px 16px;">Reset
                                                                                    your password</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                        <td class="content-block"
                                                                            style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                                            valign="top">
                                                                            <b>Dandelion,</b>
                                                                            <p>Support Team</p>
                                                                        </td>
                                                                    </tr>
                    
                                                                    <tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                        <td class="content-block"
                                                                            style="text-align: center; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;"
                                                                            valign="top">
                                                                            <div class="text-center">
                                                                                <div>
                                                                                    &copy; 2023 Dandelion.
                                                                                </div>
                                                                                <div>
                                                                                    Designed by Phat Ly.
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </body>
                    </html>';

                    // $mail->send();
                    //echo 'Message has been sent';
                    $this->view("master2", ["page" => "confirm_Sending"]);
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "not ok";
            }
        } else {
            $this->view("master2", ["page" => "reset_Password"]);
        }
    }

    public function PasswordReset($email, $token)
    {
        var_dump(base64_decode(strtr($email, '-_', '+/')), $token);
    }
}
