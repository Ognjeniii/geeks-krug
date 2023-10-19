<?php

require __DIR__ . '/../../../EditProfile/EditGitHub.php';

session_start();

$user_id = $_SESSION['user_id'];
$github = $_POST['github'];

$result = EditGitHub::updateGitHub($user_id, $github);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');
die();
