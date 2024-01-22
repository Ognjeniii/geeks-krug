<?php

require __DIR__ . '/../../../EditProfile/EditUsername.php';

session_start();

$user_id = $_SESSION['user_id'];
$username = $_POST['username'];


$result = EditUsername::updateUsername($user_id, $username);
if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=username-exists');
    die();
}
header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
