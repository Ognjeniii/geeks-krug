<?php

require __DIR__ . '/../../../User/EditProfile/EditProfilePicture.php';
require __DIR__ . '/../../../UserProgrammingLanguages/UserProgrammingLanguages.php';
require __DIR__ . '/../../../ProgrammingLanguage/ProgrammingLanguage.php';

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

$picture = EditProfilePicture::binToPicture($user_id);

$userProgrammingLanguages = UserProgrammingLanguages::getProgrammingLanguagesByUserId($user_id);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GeeksKrug Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
<?php
include __DIR__ . '/../layouts/navigation.php';
?>

<!-- user info maybe -->
<div class="container-fluid d-flex align-items-center justify-content-start gap-4 p-5 shadow" style="height: 300px;">
    <div class="row">
        <div class="col-md-6">
            <?php
            if ($user->getPicture() == null) : ?>
                <img src="/public/images/UserIMage.png" alt="profile_avatar" width="150" height="150"
                     class="rounded shadow" id="avatar">
            <?php
            else : ?>
                <img src="data:image/jpg;charset=utf8;base64,<?php
                echo $picture; ?>" alt="profile_avatar" width="150" height="150" class="rounded shadow" id="avatar">
            <?php
            endif; ?>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div class="d-flex flex-column align-items-start">
                <h3 class="mb-0 py-4"><?php
                    echo $user->getUsername(); ?></h3>
            </div>
        </div>
    </div>
</div>
<br>

<div class="p-5">
    <div class="row">
        <div class="col-3 border border-white rounded col-info p-3">
            <h3 class="mb-4">Information's</h3>
            <span class="mt-3 border-bottom"><?= $user->getFullName(); ?></span><br>
            <span class="mt-3 border-bottom"><?= $user->getEmail(); ?></span><br>
            <div class="d-flex gap-4 flex-wrap">
                <?php
            foreach ($userProgrammingLanguages as $userPL) {
                $programmingLanguageId = $userPL->getProgrammingLanguageId();
                $programmingLanguage = ProgrammingLanguage::getProgrammingLanguage($programmingLanguageId);

                if ($programmingLanguage){
                    echo '<span style="margin-left: 6px;">' . $programmingLanguage . '</span>';
                }
            }
                ?>
            </div>
            <div class="pt-3">
                <a href="/edit_profile/account_info.php" class="btn btn-outline-warning">Edit profile</a>
            </div>
        </div>
        <div class="col-7">
            2 of 3 (wider)
        </div>
        <div class="col">
            3 of 3
        </div>
    </div>
</div>

    <!-- user blogs (posts) -->
    <!--    <div class="container mt-4">-->
    <!--        <div class="row">-->
    <!--            --><?php
    //for ($i = 1; $i <= 9; $i++) : ?>
    <!--                --><?php
    //$randomSeed = rand(1, 1000); ?>
    <!--                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">-->
    <!--                    <div class="card">-->
    <!--                        <img src="https://picsum.photos/300/300?random=--><?php
    //echo $randomSeed; ?><!--" class="card-img-top" alt="Post Image">-->
    <!--                        <div class="card-body">-->
    <!--                            <h5 class="card-title">Blog Post Title --><?php
    //echo $i; ?><!--</h5>-->
    <!--                            <p class="card-text">-->
    <!--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit,-->
    <!--                                tellus eget tincidunt eleifend, mi est lacinia velit, sit amet accumsan tortor.-->
    <!--                            </p>-->
    <!--                            <a href="#" class="btn btn-primary">Read More</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            --><?php
    //endfor; ?>
    <!--        </div>-->
    <!--    </div>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

<style>
    .col-info {
        background-color: #232023;
        height: 300px;
    }
</style>

</html>
