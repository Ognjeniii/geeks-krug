<?php

require __DIR__ . '/../../../../WorkExperience/WorkExperience.php';

session_start();
$user_id = $_SESSION['user_id'];

$company_name = $_POST['company_name'];
$title = $_POST['title'];
$location = $_POST['location'];

if (!isset($company_name) || trim($company_name) === '' || !isset($title) || trim($title) === '' || !isset($location) || trim($location) === '') {
    header('Location: /edit?error=empty-fields');
    die();
}

$result = WorkExperience::addWorkExperience($user_id, $company_name, $title, $location);
if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=failed');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
