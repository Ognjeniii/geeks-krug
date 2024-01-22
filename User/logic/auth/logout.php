<?php

session_start();
session_destroy();

setcookie('stay_logged_token', "", time() - 3600, "/");
setcookie('user_token', "", time() - 3600, "/");

header('Location: /');
die();
