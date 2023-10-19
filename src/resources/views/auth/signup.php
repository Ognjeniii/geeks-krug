<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Geeks Krug</title>
    <style>
        label,
        input {
            display: block;
            margin-top: 4px;
        }

        button {
            margin-top: 20px;
            display: block;
            padding: 10px;
        }
    </style>
</head>

<body>
<h1>Sign Up</h1>
<form action="../../../User/logic/auth/signup.php" method="post">
    <label for="full_name">
        Full Name:
        <input type="text" name="full_name">
    </label>
    <label for="username">
        Username:
        <input type="text" name="username">
    </label>
    <label for="email">
        Email:
        <input type="email" name="email">
    </label>
    <label for="password">
        Password:
        <input type="password" name="password">
    </label>
    <label for="password_repeat">
        Repeat password:
        <input type="password" name="password_repeat">
    </label>
    <button type="submit">Sign Up!</button>

    <?php
    if (isset($_GET['error'])) : ?>
        <p class="error">
            <?php
            if ($_GET['error'] === 'full_name') : ?>
                Fullname is required!
            <?php
            elseif ($_GET['error'] === 'username') : ?>
                Username is required!
            <?php
            elseif ($_GET['error'] === 'email') : ?>
                Email is required!
            <?php
            elseif ($_GET['error'] === 'password') : ?>
                Password is required!
            <?php
            elseif ($_GET['error'] === 'password_repeat') : ?>
                Password repeat is required!
            <?php
            elseif ($_GET['error'] === 'pass_not_match') : ?>
                Password and password repeat are not same!
            <?php
            else : ?>
                You have not entered all required fields!
            <?php
            endif ?>
        </p>
    <?php
    endif ?>
</form>
</body>

</html>
