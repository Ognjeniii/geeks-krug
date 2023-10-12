<?php

require_once __DIR__ . '/../User.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = User::login($email, $password);

if ($user === null) {
    header('Location: ../../resources/views/login?err=error');
    die();
}

session_start();
$_SESSION['user_id'] = $user->getId();

header('Location: /test');
