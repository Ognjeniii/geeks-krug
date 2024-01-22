<?php

require __DIR__ . '/../../../EditProfile/EditEmail.php';

session_start();

$user_id = $_SESSION['user_id'];
$email = $_POST['email'];

$result = EditEmail::updateEmail($user_id, $email);
if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=email-exists');
    die();
}
header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
