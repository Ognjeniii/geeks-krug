<?php

require __DIR__ . '/../EmailSender.php';
require __DIR__ . '/../User.php';

$emailTo = $_POST["email"];

$user = User::checkEmail($emailTo);
if($user == null){
    header('Location: /reset?error=wrong-email');
    die();
}

$sentResult = EmailSender::sendEmail($emailTo);

if ($sentResult == "/") {
    header('Location: /reset?error=send-failed');
    die();
}

session_start();
$_SESSION["code_result"] = $sentResult;
$_SESSION["email"] = $emailTo;

header('Location: /verify');
die();
