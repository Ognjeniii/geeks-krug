<?php

require_once __DIR__ . '/../../User.php';

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if (empty($full_name)) {
    header('Location: /resources/views/auth/signup.php?error=full_name');
    die();
}

if (empty($username)) {
    header('Location: /resources/views/auth/signup.php?error=username');
    die();
}

if (empty($email)) {
    header('Location: /resources/views/auth/signup.php?error=email');
    die();
}

if (empty($password)) {
    header('Location: /resources/views/auth/signup.php?error=password');
    die();
}

if (empty($password_repeat)) {
    header('Location: /resources/views/auth/signup.php?error=password_repeat');
    die();
}

if ($password !== $password_repeat) {
    header('Location: /resources/views/auth/signup.php?error=pass_not_match');
    die();
}

$user = User::register(
    $full_name,
    $username,
    $email,
    $password,
);

if ($user > 0) {
    header('Location: /resources/views/auth/login.php');
    die();
}
