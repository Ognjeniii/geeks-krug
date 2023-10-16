<?php

require __DIR__ . '/../../EditProfile/EditPhoneNumber.php';

session_start();

$user_id = $_SESSION['user_id'];
$phone_number = $_POST['phone_number'];

$result = EditPhoneNumber::updatePhoneNumber($user_id, $phone_number);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');
die();
