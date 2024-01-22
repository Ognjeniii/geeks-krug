<?php

require __DIR__ . '/../../../../ProgrammingLanguage/ProgrammingLanguage.php';
require __DIR__ . '/../../../../UserProgrammingLanguages/UserProgrammingLanguages.php';

session_start();
$user_id = $_SESSION['user_id'];

$programming_language = $_POST['programming_language'];

if (strlen($programming_language) == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=language-field-empty');
    die();
}

$res = ProgrammingLanguage::checkProgrammingLanguage($programming_language);

if ($res == null) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=language-does-not-exists');
    die();
}
$programming_language_id = $res->getId();
$doesExist = UserProgrammingLanguages::doesAlreadyExist($user_id, $programming_language_id);

if ($doesExist != null) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php');
    die();
}

$inserted = UserProgrammingLanguages::createUserPLang($user_id, $programming_language_id);
if ($inserted == 0) {
    header('Location: /resources/views/user/edit_profile/edit_profile.php?error=failed');
    die();
}

header('Location: /resources/views/user/edit_profile/edit_profile.php');
die();
