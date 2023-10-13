<?php
require __DIR__ . '/../EmailSender.php';

$emailTo = $_POST["email"];

$sentResult = EmailSender::sendEmail($emailTo);

if ($sentResult == "/") {
    header('Location: /');
    die();
}

session_start();
$_SESSION["code_result"] = $sentResult;

header('Location: /verify');
die();
