<?php

require __DIR__ . '/../../../EditProfile/EditUsername.php';

session_start();

$user_id = $_SESSION['user_id'];
$username = $_POST['username'];


$result = EditUsername::updateUsername($user_id, $username);
if ($result == 0) {
    header('Location: /edit?error=username-exists');
    die();
}
header('Location: /edit');
die();
