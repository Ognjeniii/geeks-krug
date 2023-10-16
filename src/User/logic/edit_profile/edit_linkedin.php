<?php

require __DIR__ . '/../../EditProfile/EditLinkedIn.php';

session_start();

$user_id = $_SESSION['user_id'];
$linkedin = $_POST['linkedin'];

$result = EditLinkedIn::updateLinkedIn($user_id, $linkedin);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');
die();
