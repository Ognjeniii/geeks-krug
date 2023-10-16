<?php

require __DIR__ . '/../../../User/User.php';

session_start();
$user_id = $_SESSION['user_id'];

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

    <?php include __DIR__ . '/../layouts/navigation.php' ?>

    <div class="container-fluid d-flex align-items-center justify-content-start gap-4 p-5 shadow" style="height: 300px;">
        <img src="https://thinksport.com.au/wp-content/uploads/2020/01/avatar-.jpg" alt="profile_avatar" width="150" height="150">
        <h4 class="mb-0 p-4"><?php echo $user->getUsername(); ?></h4>
    </div>

    <div class="container bg-dark-subtle p-4 rounded-2 shadow-sm" style="margin-top: -37px;">
        <form action="../../../User/logic/edit_profile.php">

            <p class="fs-5">Account Information</p>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="username" class="form-label mb-0">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="<?php echo $user->getUsername(); ?>" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="email" class="form-label mb-0">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="<?php echo $user->getEmail(); ?>" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Password:</label>
                <a href="#" class="nav-item nav-link text-primary d-inline-block">Change Password</a>
            </div>

            <p class="fs-5">Basic Info</p>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="full_name" class="form-label mb-0">Full Name:</label>
                    <input type="text" class="form-control" name="full_name" placeholder="<?php echo $user->getFullName(); ?>" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <!-- we need gender in db -->

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="gender" class="form-label mb-0">Gender:</label>
                    <select name="gender" class="form-control" disabled>
                        <option value="select">Select...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="address" class="form-label mb-0">Address:</label>
                    <input type="text" class="form-control" name="address" placeholder="Serbia, Belgrade" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="birthday" class="form-label mb-0">Birthday:</label>
                    <input type="date" class="form-control" name="birthday" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="phone_number" class="form-label mb-0">Phone Number:</label>
                    <input type="tel" class="form-control" name="phone_number" placeholder="+38160123456" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="website" class="form-label mb-0">Website:</label>
                    <input type="text" class="form-control" name="website" placeholder="boda.foo" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="github" class="form-label mb-0">GitHub:</label>
                    <input type="text" class="form-control" name="github" placeholder="github.com/bodafoo" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="linkedin" class="form-label mb-0">LinkedIn:</label>
                    <input type="text" class="form-control" name="linkedin" placeholder="linkedin.com/in/slobodan-zivanovic" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="x" class="form-label mb-0">X:</label>
                    <input type="text" class="form-control" name="x" placeholder="twitter.com/twitter" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="leetcode" class="form-label mb-0">LeetCode:</label>
                    <input type="text" class="form-control" name="leetcode" placeholder="bodafoo" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <p class="fs-5">Experience</p>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="work_experience" class="form-label mb-0">Work Experience:</label>
                    <input type="text" class="form-control" name="work_experience" placeholder="something" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="education" class="form-label mb-0">Education:</label>
                    <input type="text" class="form-control" name="education" placeholder="FON" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

            <p class="fs-5">Skills</p>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <label for="programming_languages" class="form-label mb-0">Programming Languages:</label>
                    <input type="text" class="form-control" name="programming_languages" placeholder="C, CPP" disabled>
                </div>
                <div><a href="#">Edit</a></div>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>