<?php

require __DIR__ . '/../../EmailSender.php';
require __DIR__ . '/../../User.php';

$emailTo = $_POST["email"];

$user = User::checkEmail($emailTo);
if ($user == null) {
    header('Location: /resources/views/auth/reset_password.php?error=wrong-email');
    die();
}

$sentResult = EmailSender::sendEmail($emailTo);

if ($sentResult == "/") {
    header('Location: /resources/views/auth/reset_password.php?error=send-failed');
    die();
}

session_start();
$_SESSION["code_result"] = $sentResult;
$_SESSION["email"] = $emailTo; // we are making email session because, we need email later in method "reset password"

// we are making two sessions: send_time - (time when we were sent email to user for updating pass)
//                             expire_time - (time when user will not be able to input code_result)
$_SESSION['send_time'] = time();
$_SESSION['expire_time'] = $_SESSION['send_time'] + (1 * 100);

header('Location: /resources/views/auth/verify_code.php');
die();
