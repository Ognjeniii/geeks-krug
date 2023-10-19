<?php

require __DIR__ . '/../../../../WorkExperience/WorkExperience.php';

session_start();
$user_id = $_SESSION['user_id'];

$company_name = $_POST['company_name'];
$title = $_POST['title'];
$location = $_POST['location'];

$result = WorkExperience::addWorkExperience($user_id, $company_name,$title, $location);
if($result == 0){
    header('Location: /technical?error=failed');
    die();
}

header('Location: /technical');
die();

