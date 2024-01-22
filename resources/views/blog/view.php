<?php

require '/var/www/html/vendor/autoload.php';
require_once __DIR__ . '/../../../Blog/Blog.php';
require_once __DIR__ . '/../../../User/EditProfile/EditProfilePicture.php';

session_start();
if (!isset($_COOKIE['user_token']) && !isset($_SESSION['user_id'])) {
    header('Location: /resources/views/user/login.php');
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
$username = isset($path_parts[2]) ? $path_parts[2] : null;
$blogTitle = isset($path_parts[3]) ? urldecode($path_parts[3]) : null;

$title = '';

if (count($path_parts) !== 4 || empty($username) || empty($blogTitle)) {
    http_response_code(404);
    echo "Invalid URL.";
    exit;
}

$blog = Blog::getBlogByTitle(Blog::generateSlug($blogTitle));

if (!$blog) {
    http_response_code(404);
    echo "Blog not found.";
    exit;
}

$title = $blog->getTitle();
$blogData = $blog->getBlogData();
$decodedBlogData = htmlspecialchars_decode($blogData);
$blogShort = $blog->getShortDescription();
$createdAt = $blog->getCreatedAt();

$blogPicture = Blog::binToPicture($title);

$Parsedown = new Parsedown();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="/dist/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <?php
    @include __DIR__ . '/../layouts/navigation.php';
    ?>
    <div class="container mt-4">
        <div class="prose md:prose-lg lg:prose-xl mx-auto dark:prose-invert d-flex flex-column">
        <?php echo $title ?>
        <?php echo $blogShort ?>
            <img src="data:image/jpg;charset=utf8;base64,<?php
            echo $blogPicture; ?>" alt="profile_avatar" class="img-fluid" id="avatar">
            <?php echo $Parsedown::instance()
                ->setMarkupEscaped(true)
                ->text($decodedBlogData); ?>
            <?php echo $createdAt; ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
