<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In - Geeks Krug</title>
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
    <h1>Log In</h1>
    <form action="../../../User/logic/login.php" method="post">
        <label for="email">
            Email:
            <input type="email" name="email">
        </label>
        <label for="password">
            Password:
            <input type="password" name="password">
        </label>
        <button type="submit">Log In!</button>

        <?php
        if (isset($_GET['error'])) : ?>
            <p class="error">
                <?php
                if ($_GET['error'] === 'do_you_even_exists') : ?>
                    Wrong Email or Password!
                <?php
                endif ?>
            </p>
        <?php
        endif ?>
    </form>
</body>

</html>
