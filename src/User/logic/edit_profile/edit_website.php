<?php

require __DIR__ . '/../../EditProfile/EditWebsite.php';

session_start();

$user_id = $_SESSION['user_id'];
$website = $_POST['website'];

$result = EditWebsite::updateWebsite($user_id, $website);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');
die();
