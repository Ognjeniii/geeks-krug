<?php

session_start();
require __DIR__ . '/../../User.php';

$newPass = $_POST["new_pass"];
$newPassRepeat = $_POST["new_pass_repeat"];
$email = $_SESSION["email"];

if ($newPass !== $newPassRepeat) {
    header('Location: /resources/views/auth/update_password.php?error=pass-not-match');
    die();
}

$result = User::resetPassword($email, $newPass);

if ($result == 1) {
    session_destroy();
    header('Location: /resources/views/auth/login.php');
    die();
}

header('Location: /resources/views/auth/update_password.php?error=undefined');
die();
