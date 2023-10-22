<?php

require __DIR__ . '/../../../../User/EditProfile/EditProfilePicture.php';

session_start();
if (!isset($_COOKIE['user_token']) && !isset($_SESSION['user_id'])) {
    header('Location: /login');
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

</div>
