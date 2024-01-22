<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: /resources/views/auth/login.php');
    die();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=12">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<h3 class="m-5">Change your password</h3>

<div class="container">
    <div class="row pt-5">
        <div class="col-md-6">
            <form action="../../../../User/logic/edit_profile/account_info/edit_password.php" method="post">
                <label for="old_password" class="form-label">Enter old password:</label>
                <input type="password" name="old_password" class="form-control">

                <label for="new_password" class="form-label">Enter new password:</label>
                <input type="password" name="new_password" class="form-control">

                <label for="new_password_repeat" class="form-label">Repeat new password:</label>
                <input type="password" name="new_password_repeat" class="form-control">

                <button type="submit" class="btn btn-outline-dark mt-3">Save</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>
</html>
