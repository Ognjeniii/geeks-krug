<?php

require __DIR__ . '/../Blog.php';

session_start();
$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$short_description = $_POST['short_description'];
$blog_data = htmlspecialchars($_POST['blog_data']);

if($_FILES['picture']['tmp_name'] == null) {
    Blog::createBlogWithoutPic($user_id, $title, $short_description, $blog_data);
    header('Location: /resources/views/user/dashboard.php');
    die();
}
$picture = file_get_contents($_FILES['picture']['tmp_name']);

Blog::createBlog($user_id, $title, $short_description, $blog_data, $picture);

header('Location: /resources/views/user/dashboard.php');
die();
