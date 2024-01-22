<?php

require __DIR__ . '/../../../EditProfile/EditX.php';

session_start();

$user_id = $_SESSION['user_id'];
$x = $_POST['x'];

$result = EditX::updateX($user_id, $x);

if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=okay');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');

die();
