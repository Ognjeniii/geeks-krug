<?php

require __DIR__ . '/../../../EditProfile/EditGender.php';

session_start();
$user_id = $_SESSION['user_id'];
$gender = $_POST['gender'];

$result = EditGender::updateGender($user_id, $gender);
if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=failed');
    die();
}
header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
