<?php

require __DIR__ . '/../../../EditProfile/EditPassword.php';

session_start();
$user_id = $_SESSION['user_id'];

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$new_password_repeat = $_POST['new_password_repeat'];

if($new_password != $new_password_repeat){
    header('Location: /resources/views/user/edit_profile/edit_password.php?error=pass-not-match');
    die();
}

$result = EditPassword::editPassword($user_id, $old_password, $new_password);

if($result == 0){
    header('Location: /resources/views/user/edit_profile/edit_password.php?error=edit-failed');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_password.php?success');
die();


