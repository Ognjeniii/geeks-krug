<?php

require __DIR__ . '/../../../User/EditProfile/EditProfilePicture.php';

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
    <title>Create Blog - Geeks Krug</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
</head>

<body data-bs-theme="dark">
    <?php @include __DIR__ . '/../layouts/navigation.php' ?>

    <div class="container d-flex align-items-center justify-content-center" style="height: calc(100vh - 56px);">
        <div class="col-md-8 mx-auto">
            <form action="../../../Blog/logic/create-blog.php" method="post" class="p-4 md-5 border rounded-3 bg-dark" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Creating Social Media App">
                    <label for="floatingInput">Title:</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="floatingTextarea" name="short_description"></textarea>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" accept="image/*" name="picture">
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="floatingTextArea" name="blog_data"></textarea>
                </div>
                <button type="submit" class="w-100 btn btn-lg btn-primary">Create Blog</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
