<?php

require __DIR__ . '/../../../EditProfile/EditBirthday.php';

session_start();

$user_id = $_SESSION['user_id'];
$birthday = $_POST['birthday'];

$result = EditBirthday::updateBirthday($user_id, $birthday);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');
die();
