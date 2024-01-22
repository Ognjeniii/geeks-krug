<?php

session_start();

if (!isset($_SESSION['code_verified'])) {
    header('Location: /resources/views/auth/login.php');
    die();
}

// check does time of 10 min is expired
$now = time();
$expire_time = $_SESSION['expire_time'];
if($now > $expire_time) {
    session_destroy();
    header('Location: /resources/views/auth/reset_password.php');
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update password</title>
</head>

<body>
<form action="../../../User/logic/auth/update_password.php" method="post">

    <label for="new_pass">Enter new password:</label>
    <input type="password" name="new_pass">

    <label for="new_pass_repeat">Repeat new password:</label>
    <input type="password" name="new_pass_repeat">

    <button type="submit">Update password</button>
</form>
</body>

</html>
