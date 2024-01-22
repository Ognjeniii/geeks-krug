<?php

require_once __DIR__ . '/../../User.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = User::login($email, $password);

if ($user === null) {
    header('Location: /resources/views/auth/login.php?error=do_you_even_exists');
    die();
}

session_start();

if (isset($_POST['stay_logged'])) {
    $stay_logged_cookie = "stay_logged_token";
    $email_hashed = password_hash($email, PASSWORD_DEFAULT);
    $stay_logged_cookie_value = $email_hashed;
    setcookie($stay_logged_cookie, $stay_logged_cookie_value, time() + (86400 * 30), "/");

    $user_id_cookie = "user_token";
    $user_id_cookie_value = $user->getId();
    setcookie($user_id_cookie, $user_id_cookie_value, time() + (86400 * 30), "/");
}

$_SESSION['user_id'] = $user->getId();
$_SESSION['full_name'] = $user->getFullName();

$user_type_id = $user->getUserTypeId();
$_SESSION['user_type_id'] = $user_type_id;

//if ($user_type_id == 2) {
//    header('Location: /home');
//    die();
//}

header('Location: /');
die();
