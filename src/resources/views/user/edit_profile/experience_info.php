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
    <h5>Experience Info</h5>

    <div class="mt-4">
        <h6>Work:</h6>
        <form action="../../../../User/logic/edit_profile/experience_info/add_work_experience.php" method="post" class="d-flex flex-column gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="company_name">
                <label for="floatingInput">Company name:</label>
            </div>
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="title">
                <label for="floatingInput">Title:</label>
            </div>
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="location">
                <label for="floatingInput">Location:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <h6>Education:</h6>
        <form action="../../../../User/logic/edit_profile/experience_info/add_education.php" method="post" class="d-flex flex-column gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="school">
                <label for="floatingInput">School:</label>
            </div>
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="degree">
                <label for="floatingInput">Degree:</label>
            </div>
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="field_of_study">
                <label for="floatingInput">Field of Study:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

</div>
