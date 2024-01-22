<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Geeks Krug</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
</head>

<body data-bs-theme="dark">

    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                GK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="padding-inline: 6px;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Geeks Krug</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/resources/views/auth/login.php">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/resources/views/auth/signup.php">Sign up</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-md-8 mx-auto">
            <form action="../../../User/logic/auth/signup.php" method="post" class="p-4 md-5 border rounded-3 bg-dark">
                <div class="form-floating mb-3">
                    <input type="text" name="full_name" class="form-control" id="floatingInput" placeholder="John Smith">
                    <label for="floatingInput">Full Name:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="john">
                    <label for="floatingInput">Username:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="john@smith.com" name="email">
                    <label for="floatingInput">Email:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Repeat Password" name="password_repeat">
                    <label for="floatingPassword">Repeat Password:</label>
                </div>
                <button type="submit" class="w-100 btn btn-lg btn-primary">Sign Up</button>
                <hr class="my-4">
                <a href="/resources/views/auth/login.php" class="w-100 btn btn-lg btn-success">Already Have Account?</a>

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
                            Password and password repeat are not the same!
                        <?php
                        else : ?>
                            You have not entered all required fields!
                        <?php
                        endif ?>
                    </p>
                <?php
                endif ?>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
