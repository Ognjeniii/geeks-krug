<?php

require __DIR__ . '/../../../EditProfile/EditProfilePicture.php';

session_start();

$user_id = $_SESSION['user_id'];
$picture = file_get_contents($_FILES['picture_input']['tmp_name']);

$result = EditProfilePicture::updatePicture($user_id, $picture);

if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=err');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
