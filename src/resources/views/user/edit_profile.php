<?php

require __DIR__ . '/../../../User/User.php';

session_start();
if (!isset($_COOKIE['user_token']) && !isset($_SESSION['user_id'])) {
    header('Location: /login');
    die();
}

if (isset($_COOKIE['user_token'])) {
    $user_id = $_COOKIE['user_token'];
} else {
    $user_id = $_SESSION['user_id'];
}
$user = User::getUserById($user_id);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .form-control {
            width: unset;
        }
    </style>

</head>

<body data-bs-theme="dark">

    <?php
    include __DIR__ . '/../layouts/navigation.php' ?>

    <div class="container-fluid d-flex align-items-center justify-content-start gap-4 p-5 shadow" style="height: 300px;">
        <img src="https://thinksport.com.au/wp-content/uploads/2020/01/avatar-.jpg" alt="profile_avatar" width="150" height="150" class="rounded shadow" id="avatar">
        <h4 class="mb-0 p-4"><?php echo $user->getUsername(); ?></h4>
    </div>

    <div style="background-color: rgba(150, 150, 150, 0.5); position: fixed; left: 0; top: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center; z-index: 1000;" id="iframeOverlay">
        <div class="background-profile-div" style="background-color: rgb(255, 255, 255); width: 90%; max-width: 800px; height: 90%; max-height: 600px; position: relative; padding: 20px; overflow: hidden; z-index: 1002; box-shadow: 0px 3px 8px rgba(34, 25, 25, 0.4);">
            <iframe src="/resources/views/layouts/profile_picture.php" width="100%" height="100%"></iframe>
        </div>
    </div>

    <div class="container bg-dark-subtle p-4 rounded-2 shadow-sm" style="margin-top: -37px;">

        <p class="fs-5">Account Information</p>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_username.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php echo $user->getUsername(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_email.php" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $user->getEmail(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <a href="#" class="nav-item nav-link text-primary d-inline-block">Change Password</a>
        </div>

        <hr />
        <p class="fs-5">Basic Info</p>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_full_name.php" method="post">
                <label for="full_name">Full name:</label>
                <input type="text" name="full_name" value="<?php echo $user->getFullName(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <form action="../../../User/logic/edit_profile/edit_gender.php" method="post">
            <label for="gender">Gender:</label>
            <select name="gender">
                <option value="select">Select...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <button type="submit">save</button>
        </form>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_address.php" method="post">
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $user->getAddress(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_birthday.php" method="post">
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday" value="<?php echo $user->getBirthday(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_phone_number.php" method="post">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" name="phone_number" value="<?php echo $user->getPhoneNumber(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_website.php" method="post">
                <label for="website">Website:</label>
                <input type="text" name="website" value="<?php echo $user->getWebsite(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_github.php" method="post">
                <label for="github">GitHub:</label>
                <input type="text" name="github" value="<?php echo $user->getGithub(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_linkedin.php" method="post">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" name="linkedin" value="<?php echo $user->getLinkedin(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_x.php" method="post">
                <label for="x">X:</label>
                <input type="text" name="x" value="<?php echo $user->getX(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_leetcode.php" method="post">
                <label for="leetcode">LeetCode:</label>
                <input type="text" name="leetcode" value="<?php echo $user->getLeetcode(); ?>">
                <button type="submit">save</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const avatar = document.getElementById('avatar');
            const iframeOverlay = document.getElementById('iframeOverlay');

            avatar.addEventListener('click', function() {
                iframeOverlay.style.display = 'flex';
            });

            iframeOverlay.addEventListener('click', function(event) {
                if (event.target === iframeOverlay) {
                    iframeOverlay.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>