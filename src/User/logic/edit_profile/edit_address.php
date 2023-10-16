<?php

require __DIR__ . '/../../EditProfile/EditAddress.php';

session_start();

$user_id = $_SESSION['user_id'];
$address = $_POST['address'];

$result = EditAddress::updateAddress($user_id, $address);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');
die();
