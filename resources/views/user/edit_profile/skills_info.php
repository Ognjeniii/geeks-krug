<?php

require __DIR__ . '/../../../../User/EditProfile/EditProfilePicture.php';
require __DIR__ . '/../../../../UserProgrammingLanguages/UserProgrammingLanguages.php';
require __DIR__ . '/../../../../ProgrammingLanguage/ProgrammingLanguage.php';

session_start();
if (!isset($_COOKIE['user_token']) && !isset($_SESSION['user_id'])) {
    header('Location: /resources/views/auth/login.php');
    die();
}

if (isset($_COOKIE['user_token'])) {
    $user_id = $_COOKIE['user_token'];
    $_SESSION['user_id'] = $user_id;
} else {
    $user_id = $_SESSION['user_id'];
}

$user = User::getUserById($user_id);

$picture = EditProfilePicture::binToPicture($user_id);

$userProgrammingLanguages = UserProgrammingLanguages::getProgrammingLanguagesByUserId($user_id);
?>

<div class="container-fluid bg-dark-subtle p-4 rounded-2 shadow-sm">
    <h5>Skills Info</h5>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/skills_info/add_programming_language.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="programming_language">
                <label for="floatingInput">Technical Skills:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <div class="d-flex gap-4 flex-wrap">
            <?php
            foreach ($userProgrammingLanguages as $userPL) {
                $programmingLanguageId = $userPL->getProgrammingLanguageId();
                $programmingLanguage = ProgrammingLanguage::getProgrammingLanguage($programmingLanguageId);

                if ($programmingLanguage) {
                    echo '<form action="../../../User/logic/edit_profile/skills_info/delete_programming_language.php" method="post" onsubmit="return confirm(\'Are you sure you want to delete this skill?\');">';
                    echo '<input type="hidden" name="programming_language_id" value="' . $programmingLanguageId . '">';
                    echo '<button type="submit" class="btn btn-outline-danger">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">';
                    echo '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>';
                    echo '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>';
                    echo '</svg>';
                    echo '<span style="margin-left: 6px;">' . $programmingLanguage . '</span>';
                    echo '</button>';
                    echo '</form>';
                }
            }
            ?>
        </div>
    </div>
</div>

</div>
