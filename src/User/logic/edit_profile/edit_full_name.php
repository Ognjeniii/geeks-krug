<?php

require __DIR__ . '/../../EditProfile/EditFullName.php';

session_start();
$user_id = $_SESSION['user_id'];
$full_name = $_POST['full_name'];

$result = EditFullName::updateFullName($user_id, $full_name);
if($result == 0){
    header('Location: /edit?error=failed');
    die();
}
header('Location: /edit');
die();
