<?php

require __DIR__ . '/../../../../UserProgrammingLanguages/UserProgrammingLanguages.php';

session_start();

$user_id = $_SESSION['user_id'];
$programming_language_id = $_POST['programming_language_id'];

$result = UserProgrammingLanguages::deleteProgrammingLanguageByUserId($user_id, $programming_language_id);

if ($result == 0) {
    header('Location: /edit?error=err');
    die();
}

header('Location: /edit');
die();
