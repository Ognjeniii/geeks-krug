<?php

require __DIR__ . '/../../EditProfile/EditX.php';

session_start();

$user_id = $_SESSION['user_id'];
$x = $_POST['x'];

$result = EditX::updateX($user_id, $x);

if ($result == 0) {
    header('Location: /edit?error=okay');
    die();
}

header('Location: /edit');

die();
