<?php

require __DIR__ . '/../../../EditProfile/EditLeetCode.php';

session_start();

$user_id = $_SESSION['user_id'];
$leetcode = $_POST['leetcode'];

$result = EditLeetCode::updateLeetCode($user_id, $leetcode);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');
die();
