<?php

session_start();
if(!isset($_SESSION['code_result'])){
    header('Location: /reset');
    die();
}

$now = time();
$expire_time = $_SESSION['expire_time'];
if($now > $expire_time) {
    session_destroy();
    header('Location: /reset');
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
    <title>Document</title>
</head>

<body>
<form action="../../../User/logic/auth/verify_code.php" method="post">
    <label for="code">Verify code:</label>
    <input type="text" name="code">

    <button type="submit">Submit</button>
</form>
</body>

</html>
