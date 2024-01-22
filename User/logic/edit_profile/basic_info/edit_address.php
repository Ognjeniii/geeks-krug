<?php

require __DIR__ . '/../../../EditProfile/EditAddress.php';

session_start();

$user_id = $_SESSION['user_id'];
$address = $_POST['address'];

$result = EditAddress::updateAddress($user_id, $address);

if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=okay');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
