<?php

require __DIR__ . '/../User.php';

$newPass = $_POST["new_pass"];
$newPassRepeat = $_POST["new_pass_repeat"];
$email = $_POST["email"];

if($newPass !== $newPassRepeat){
    header('Location: /update');
    die();
}

$result = User::resetPassword($email, $newPass);
if($result == -1){
    header('Location: /update?error=wrong-email');
    die();
}

header('Location: /login');
die();

?>
