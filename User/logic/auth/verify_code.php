<?php

require __DIR__ . "/../../EmailSender.php";

session_start();

$generatedCode = $_SESSION["code_result"];

$userCode = $_POST["code"];
if ($generatedCode !== $userCode) {
    header('Location: /resources/views/auth/verify_code.php?error=distinct-code');
    die();
}

$_SESSION['code_verified'] = true;

header('Location: /resources/views/auth/update_password.php');
die();
