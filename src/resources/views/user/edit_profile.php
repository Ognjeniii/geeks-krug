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
        <img src="https://thinksport.com.au/wp-content/uploads/2020/01/avatar-.jpg" alt="profile_avatar" width="150" height="150" class="rounded shadow">
        <h4 class="mb-0 p-4"><?php
                                echo $user->getUsername(); ?></h4>
    </div>

    <div class="container bg-dark-subtle p-4 rounded-2 shadow-sm" style="margin-top: -37px;">

        <p class="fs-5">Account Information</p>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_username.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php
                                                            echo $user->getUsername(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_email.php" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php
                                                        echo $user->getEmail(); ?>">
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
                <input type="text" name="full_name" value="<?php
                                                            echo $user->getFullName(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <form action="#" method="post">
            <div class="mb-3 d-flex justify-content-between align-items-center" id="gender-row">
                <div class="d-flex align-items-center gap-2">
                    <label for="gender" class="form-label mb-0">Gender:</label>
                    <select id="gender-select" name="gender" class="form-control" disabled>
                        <option value="select">Select...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div>
                    <button type="button" class="edit-button btn btn-primary" data-row-id="gender-row">Edit</button>
                    <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
                </div>
            </div>
        </form>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_address.php" method="post">
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php
                                                            echo $user->getAddress(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_birthday.php" method="post">
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday" value="<?php
                                                            echo $user->getBirthday(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_phone_number.php" method="post">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" name="phone_number" value="<?php
                                                                echo $user->getPhoneNumber(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_website.php" method="post">
                <label for="website">Website:</label>
                <input type="text" name="website" value="<?php
                                                            echo $user->getWebsite(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_github.php" method="post">
                <label for="github">GitHub:</label>
                <input type="text" name="github" value="<?php
                                                        echo $user->getGithub(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_linkedin.php" method="post">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" name="linkedin" value="<?php
                                                            echo $user->getLinkedin(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_x.php" method="post">
                <label for="x">X:</label>
                <input type="text" name="x" value="<?php
                                                    echo $user->getX(); ?>">
                <button type="submit">save</button>
            </form>
        </div>

        <div class="m-3">
            <form action="../../../User/logic/edit_profile/edit_leetcode.php" method="post">
                <label for="leetcode">LeetCode:</label>
                <input type="text" name="leetcode" value="<?php
                                                            echo $user->getLeetcode(); ?>">
                <button type="submit">save</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        function handleEditClick(event) {
            event.preventDefault();
            const editButton = event.target;
            const rowId = editButton.getAttribute('data-row-id');
            if (rowId) {
                const row = document.getElementById(rowId);
                const inputs = row.getElementsByTagName('input');
                const select = row.querySelector('select');
                if (select) {
                    select.removeAttribute('disabled');
                }
                for (const input of inputs) {
                    input.removeAttribute('disabled');
                }

                const saveButton = row.querySelector('.save-button');
                const editButton = row.querySelector('.edit-button');

                saveButton.style.display = 'block';
                editButton.style.display = 'none';
            }
        }

        function handleSaveClick(event) {
            event.preventDefault();
            const saveButton = event.target;
            const row = saveButton.closest('div[id]');
            const form = row.closest('form');
            const inputs = row.getElementsByTagName('input');
            const select = row.querySelector('select');
            if (select) {
                select.setAttribute('disabled', 'disabled');
            }
            for (const input of inputs) {
                input.setAttribute('disabled', 'disabled');
            }

            const editButton = row.querySelector('.edit-button');

            saveButton.style.display = 'none';
            editButton.style.display = 'block';

            form.submit();
        }

        const editButtons = document.querySelectorAll('.edit-button');
        for (const button of editButtons) {
            button.addEventListener('click', handleEditClick);
        }

        const saveButtons = document.querySelectorAll('.save-button');
        for (const button of saveButtons) {
            button.addEventListener('click', handleSaveClick);
        }
    </script>

</body>

</html>