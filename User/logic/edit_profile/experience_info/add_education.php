<?php

require __DIR__ . '/../../../../Education/Education.php';

session_start();

$user_id = $_SESSION['user_id'];
$school = $_POST['school'];
$degree = $_POST['degree'];
$field_of_study = $_POST['field_of_study'];

if (!isset($school) || trim($school) === '' || !isset($degree) || trim($degree) === '' || !isset($field_of_study) || trim($field_of_study) === '') {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=empty-fields');
    die();
}

$result = Education::addEducation($user_id, $school, $degree, $field_of_study);

if ($result == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=err');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
