<?php

require __DIR__ . '/../../../User/User.php';

session_start();
if(!isset($_COOKIE['user_token']) && !isset($_SESSION['user_id'])){
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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
    <img src="https://thinksport.com.au/wp-content/uploads/2020/01/avatar-.jpg" alt="profile_avatar" width="150"
         height="150" class="rounded shadow">
    <h4 class="mb-0 p-4"><?php
        echo $user->getUsername(); ?></h4>
</div>

<div class="container bg-dark-subtle p-4 rounded-2 shadow-sm" style="margin-top: -37px;">

    <p class="fs-5">Account Information</p>

<!--    <form action="../../../User/logic/edit_profile/edit_username.php" method="post">-->
<!--        <div class="mb-3 d-flex justify-content-between align-items-center" id="username-row">-->
<!--            <div class="d-flex align-items-center gap-2">-->
<!--                <label for="username" class="form-label mb-0">Username:</label>-->
<!--                <input type="text" class="form-control" name="username" placeholder="--><?php
//                echo $user->getUsername(); ?><!--" >-->
<!--            </div>-->
<!--            <div>-->
<!--                <button type="button" class="edit-button btn btn-primary" data-row-id="username-row">Edit</button>-->
<!--                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->

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

    <hr/>
    <p class="fs-5">Basic Info</p>

    <div class="m-3">
        <form action="../../../User/logic/edit_profile/edit_full_name.php" method="post">
            <label for="full_name">Full name:</label>
            <input type="text" name="full_name" value="<?php echo $user->getFullName(); ?>">
            <button type="submit">save</button>
        </form>
    </div>

    <div class="m-3">
        <form action="../../../User/logic/edit_profile/edit_gender.php" method="post">
            <label for="gender">Gender</label>
            <select name="gender">
                <option value="select">Select...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
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

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="address-row">
            <div class="d-flex align-items-center gap-2">
                <label for="address" class="form-label mb-0">Address:</label>
                <input type="text" class="form-control" name="address" placeholder="Serbia, Belgrade" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="address-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="birthday-row">
            <div class="d-flex align-items-center gap-2">
                <label for="birthday" class="form-label mb-0">Birthday:</label>
                <input type="date" class="form-control" name="birthday" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="birthday-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="phonenumber-row">
            <div class="d-flex align-items-center gap-2">
                <label for="phone_number" class="form-label mb-0">Phone Number:</label>
                <input type="tel" class="form-control" name="phone_number" placeholder="+38160123456" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="phonenumber-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="website-row">
            <div class="d-flex align-items-center gap-2">
                <label for="website" class="form-label mb-0">Website:</label>
                <input type="text" class="form-control" name="website" placeholder="boda.foo" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="website-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="github-row">
            <div class="d-flex align-items-center gap-2">
                <label for="github" class="form-label mb-0">GitHub:</label>
                <input type="text" class="form-control" name="github" placeholder="github.com/bodafoo" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="github-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="linkedin-row">
            <div class="d-flex align-items-center gap-2">
                <label for="linkedin" class="form-label mb-0">LinkedIn:</label>
                <input type="text" class="form-control" name="linkedin" placeholder="linkedin.com/in/slobodan-zivanovic"
                       disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="linkedin-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="x-row">
            <div class="d-flex align-items-center gap-2">
                <label for="x" class="form-label mb-0">X:</label>
                <input type="text" class="form-control" name="x" placeholder="twitter.com/twitter" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="x-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="leetcode-row">
            <div class="d-flex align-items-center gap-2">
                <label for="leetcode" class="form-label mb-0">LeetCode:</label>
                <input type="text" class="form-control" name="leetcode" placeholder="bodafoo" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="leetcode-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <hr/>
    <p class="fs-5">Experience</p>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="workexperience-row">
            <div class="d-flex align-items-center gap-2">
                <label for="work_experience" class="form-label mb-0">Work Experience:</label>
                <input type="text" class="form-control" name="work_experience" placeholder="something" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="workexperience-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="education-row">
            <div class="d-flex align-items-center gap-2">
                <label for="education" class="form-label mb-0">Education:</label>
                <input type="text" class="form-control" name="education" placeholder="FON" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="education-row">Edit</button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

    <hr/>
    <p class="fs-5">Skills</p>

    <form action="#" method="post">
        <div class="mb-3 d-flex justify-content-between align-items-center" id="programminglanguages-row">
            <div class="d-flex align-items-center gap-2">
                <label for="programming_languages" class="form-label mb-0">Programming Languages:</label>
                <input type="text" class="form-control" name="programming_languages" placeholder="C, CPP" disabled>
            </div>
            <div>
                <button type="button" class="edit-button btn btn-primary" data-row-id="programminglanguages-row">Edit
                </button>
                <button type="submit" class="save-button btn btn-success" style="display: none;">Save</button>
            </div>
        </div>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
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
