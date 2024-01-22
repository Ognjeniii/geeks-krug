<?php

require __DIR__ . '/../../../EditProfile/EditFullName.php';

session_start();
$user_id = $_SESSION['user_id'];
$full_name = $_POST['full_name'];

$result = EditFullName::updateFullName($user_id, $full_name);
if($result == 0){
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=failed');
    die();
}
header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
