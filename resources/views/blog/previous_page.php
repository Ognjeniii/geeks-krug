<?php

require '/var/www/html/vendor/autoload.php';
require_once __DIR__ . '/../../../Blog/Blog.php';
require_once __DIR__ . '/../../../User/EditProfile/EditProfilePicture.php';

session_start();
if (!isset($_COOKIE['user_token']) && !isset($_SESSION['user_id'])) {
    header('Location: /resources/views/auth/login.php');
    die();
}

if (isset($_COOKIE['user_token'])) {
    $user_id = $_COOKIE['user_token'];
} else {
    $user_id = $_SESSION['user_id'];
}

$user = User::getUserById($user_id);

$picture = EditProfilePicture::binToPicture($user_id);

$parts = parse_url($_SERVER['REQUEST_URI']);
$path_parts = explode('/', $parts['path']);

$next_page = isset($path_parts[2]) ? urldecode($path_parts[2]) : null;

$smallestId = $_SESSION['smallestId'];
$biggestId = $_SESSION['biggestId'];

$blogs = Blog::getPreviousRecords($biggestId);

if (count($blogs) > 0) {

    $biggestId = -1;
    $smallestId = 2147483646;

    foreach ($blogs as $blog) {
        $blogId = $blog->getId();

        if ($blogId < $smallestId) {
            $smallestId = $blogId;
        }

        if ($blogId > $biggestId) {
            $biggestId = $blogId;
        }
    }

    $_SESSION['smallestId'] = $smallestId;
    $_SESSION['biggestId'] = $biggestId;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <?php
    @include __DIR__ . '/../layouts/navigation.php'; ?>


    <div class="container">
        <div class="row">

            <div class="col">
                <div class="container w-100 mt-4 bg-secondary text-dark border rounded" style="min-height: 350px;">
                    <h2 class="p-3 fw-bold">Geeks-krug</h1>
                    <hr>
                    <div class="pb-2">
                        <a href="/" class="text-dark fw-bolder link-underline link-underline-opacity-0 m-3">Home</a>
                    </div>
                    <div class="pb-2">
                        <a href="/resources/views/user/profile.php" class="text-dark fw-bolder link-underline link-underline-opacity-0 m-3">Your profile</a>
                    </div>
                    <div class="pb-2">
                        <a href="" class="text-dark fw-bolder link-underline link-underline-opacity-0 m-3">Saved</a>
                    </div>
                    <div class="pb-2">
                        <a href="" class="text-dark fw-bolder link-underline link-underline-opacity-0 m-3">About</a>
                    </div>
                </div>
            </div>

            <div class="col-6">
                        <?php if (count($blogs) > 0): ?>
                   <?php foreach ($blogs as $blog): ?>
                        <div class="container mt-4 p-3 rounded" style="background-color: #303030">
                            <div class="">
                                <?php echo $blog->getUserByUserId($blog->getUserId()) ?>
                            </div>
                            <div class="d-flex justify-content-left m-4">
                                <h3><?php echo $blog->getTitle() ?></h3>
                                <p></p>
                            </div>
                            <div>
                                <h5><?php echo $blog->getShortDescription() ?></h5>
                            </div>
                            <div>
                                <?php if ($blog->getPicture() != null): ?>
                                    <p>Prikaz slike...</p>
                                <?php endif ?>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="col">
                <div class="container w-100 h-50 mt-4 bg-secondary text-dark border rounded"  style="min-height: 350px;">

                    <div>

                    </div>

                </div>
            </div>

        </div>
        <?php if (count(Blog::getNextRecords($smallestId)) > 0): ?>
            <a href="/resources/views/blog/next_page.php" class="btn">Next page</a>
        <?php endif ?>
        <?php if (count(Blog::getPreviousRecords($biggestId)) > 0): ?>
            <a href="/resources/views/blog/previous_page.php" class="btn">Previous page</a>
        <?php endif ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
