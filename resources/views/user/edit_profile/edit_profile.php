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

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">

    <?php
    include __DIR__ . '/../../layouts/navigation.php'
    ?>

    <div class="container-fluid d-flex align-items-center justify-content-start gap-4 p-5 shadow" style="height: 300px;">
        <div class="row">
            <div class="col-md-6">
                <?php if ($user->getPicture() == null) : ?>
                    <img src="/public/images/UserImage.png" alt="profile_avatar" width="150" height="150" class="rounded shadow" id="avatar">
                <?php else : ?>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $picture; ?>" alt="profile_avatar" width="150" height="150" class="rounded shadow" id="avatar">
                <?php endif; ?>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="d-flex flex-column align-items-start">
                    <h3 class="mb-0 py-4"><?php echo $user->getUsername(); ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div style="background-color: rgba(100, 100, 100, 0.5); position: fixed; left: 0; top: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center; z-index: 1000; padding: 40px;" id="iframeOverlay">
        <div class="background-profile-div" style="background-color: #212529; border-radius: 8px; width: 100%; max-width: 600px; height: 100%; max-height: 400px; position: relative; padding: 20px; overflow: hidden; z-index: 1002; box-shadow: 0px 3px 8px rgba(34, 25, 25, 0.4); display: flex; justify-content: center; align-items: center;">
            <iframe src="/resources/views/user/edit_profile/profile_picture.php" style="width: 100%; height: 100%; border: none; cursor: pointer;"></iframe>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: -37px;">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="container bg-body-tertiary p-4 rounded-2 shadow-sm">
                    <nav class="navbar">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active nav-left-link" aria-current="page" href="#" data-section="basic_info">Basic
                                    Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-left-link" href="" data-section="account_info">Account Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-left-link" href="" data-section="experience_info">Experience Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-left-link" href="" data-section="skills_info">Skills Info</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-6" id="sectionContainer">
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sectionContainer = document.getElementById('sectionContainer');
            const navLinks = document.querySelectorAll('.nav-left-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    const sectionToLoad = link.getAttribute('data-section');
                    const url = `/resources/views/user/edit_profile/${sectionToLoad}.php`;

                    fetch(url)
                        .then(response => response.text())
                        .then(data => {
                            sectionContainer.innerHTML = data;

                            navLinks.forEach(navLink => {
                                navLink.classList.remove('active');
                            });

                            link.classList.add('active');
                        })
                        .catch(error => {
                            console.error('Error loading section:', error);
                        });
                });
            });
        });
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
