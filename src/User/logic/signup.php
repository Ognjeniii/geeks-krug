<?php

require_once __DIR__ . '/../User.php';

if (!isset($_POST['full_name'])) {
    header('Location: /signup?error=full_name');
    die();
}

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if (empty($username)) {
    header('Location: /signup?error=username');
    die();
}

if (empty($email)) {
    header('Location: /signup?error=email');
    die();
}

if (empty($password)) {
    header('Location: /signup?error=password');
    die();
}

if (empty($password_repeat)) {
    header('Location: /signup?error=password_repeat');
    die();
}

if ($password !== $password_repeat) {
    header('Location: /signup?error=pass_not_match');
    die();
}

$user = User::register(
    $full_name,
    $username,
    $email,
    $password,
);

if ($user > 0) {
    header('Location: /login');
    die();
}
