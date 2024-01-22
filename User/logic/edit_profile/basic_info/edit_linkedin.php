<?php

require __DIR__ . '/../../../EditProfile/EditLinkedIn.php';

session_start();

$user_id = $_SESSION['user_id'];
$linkedin = $_POST['linkedin'];

$result = EditLinkedIn::updateLinkedIn($user_id, $linkedin);

if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=okay');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
