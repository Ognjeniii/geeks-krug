<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../vendor/autoload.php';

class EmailSender
{

    public static function sendEmail($emailTo) : string
    {
        $mail = new PHPMailer(true);
        $num = self::generateNumber();
        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'geeks.krug@gmail.com';
            $mail->Password = 'yuabquxtgwlkwhpi';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom("geeks.krug@gmail.com", "Geeks Krug Ink");
            $mail->addAddress($emailTo);
            $mail->isHTML(true);
            $mail->Subject = "Password reset - Geeks Krug";
            $mail->Body = "Code: " . $num;
            $mail->send();

            return $num;
        }catch (\Exception $ee){
            echo $ee;
        }
        return "/";
    }

    private static function generateNumber() : string
    {
        $number = "";
        for ($i = 0; $i < 4; $i++) {
            $number .= strval(rand(0, 9));
        }
        return $number;
    }
}
