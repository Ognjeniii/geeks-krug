<?php

require __DIR__ . '/../../../../Education/Education.php';

session_start();

$user_id = $_SESSION['user_id'];
$school = $_POST['school'];
$degree = $_POST['degree'];
$field_of_study = $_POST['field_of_study'];

$result = Education::addEducation($user_id, $school, $degree, $field_of_study);

if ($result == 0) {
    header('Location: /edit?error=err');
    die();
}

header('Location: /edit');
die();
