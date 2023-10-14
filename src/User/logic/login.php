<?php

require_once __DIR__ . '/../User.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = User::login($email, $password);

if ($user === null) {
    header('Location: /login?error=do_you_even_exists');
    die();
}

session_start();

$_SESSION['user_id'] = $user->getId();

$user_type_id = $user->getUserTypeId();
$_SESSION['user_type_id'] = $user_type_id;

if($user_type_id == 2){
    header('Location: /test');
    die();
}
