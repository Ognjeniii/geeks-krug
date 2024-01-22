<?php

require __DIR__ . '/../../../EditProfile/EditBirthday.php';

session_start();

$user_id = $_SESSION['user_id'];
$birthday = $_POST['birthday'];

$result = EditBirthday::updateBirthday($user_id, $birthday);

if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=okay');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
