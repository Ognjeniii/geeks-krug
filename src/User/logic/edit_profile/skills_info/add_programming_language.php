<?php

require __DIR__ . '/../../../../ProgrammingLanguage/ProgrammingLanguage.php';
require __DIR__ . '/../../../../UserProgrammingLanguages/UserProgrammingLanguages.php';

session_start();
$user_id = $_SESSION['user_id'];

$programming_language = $_POST['programming_language'];

if (strlen($programming_language) == 0) {
    header('Location: /edit?error=language-field-empty');
    die();
}

$res = ProgrammingLanguage::checkProgrammingLanguage($programming_language);

if ($res == null) {
    header('Location: /edit?error=language-does-not-exists');
    die();
}
$programming_language_id = $res->getId();
$doesExist = UserProgrammingLanguages::doesAlreadyExist($user_id, $programming_language_id);

if ($doesExist != null) {
    header('Location: /edit');
    die();
}

$inserted = UserProgrammingLanguages::createUserPLang($user_id, $programming_language_id);
if ($inserted == 0) {
    header('Location: /edit?error=failed');
    die();
}

header('Location: /edit');
die();
