<?php

require __DIR__ . '/../../../../User/EditProfile/EditProfilePicture.php';

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

?>

<div class="container-fluid bg-dark-subtle p-4 rounded-2 shadow-sm">
    <h5>Basic Info</h5>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_full_name.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="full_name" value="<?php
                echo $user->getFullName(); ?>">
                <label for="floatingInput">Full Name:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_gender.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <select class="form-select" id="floatingSelect" name="gender">
                    <option value="select">Select...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <label for="floatingSelect">Gender:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_address.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="address" value="<?php
                echo $user->getAddress(); ?>">
                <label for="floatingInput">Address:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_birthday.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="date" class="form-control" id="floatingInput" name="birthday" value="<?php
                echo $user->getBirthday(); ?>">
                <label for="floatingInput">Birthday:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_phone_number.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="tel" class="form-control" id="floatingInput" name="phone_number" value="<?php
                echo $user->getPhoneNumber(); ?>">
                <label for="floatingInput">Phone Number:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_website.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="website" value="<?php
                echo $user->getWebsite(); ?>">
                <label for="floatingInput">Website:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_github.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="github" value="<?php
                echo $user->getGithub(); ?>">
                <label for="floatingInput">GitHub:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_linkedin.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="linkedin" value="<?php
                echo $user->getLinkedin(); ?>">
                <label for="floatingInput">LinkedIn:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_x.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="x" value="<?php
                echo $user->getX(); ?>">
                <label for="floatingInput">X:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/basic_info/edit_leetcode.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="leetcode" value="<?php
                echo $user->getLeetcode(); ?>">
                <label for="floatingInput">LeetCode:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

</div>
