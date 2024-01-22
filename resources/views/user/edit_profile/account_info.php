<?php
require __DIR__ . '/../../../../User/EditProfile/EditProfilePicture.php';

session_start();
if (!isset($_COOKIE['user_token']) && !isset($_SESSION['user_id'])) {
    header('Location: /resources/views/auth/login.php');
    die();
}

if (isset($_COOKIE['user_token'])) {
    $user_id = $_COOKIE['user_token'];
    $_SESSION['user_id'] = $user_id;
} else {
    $user_id = $_SESSION['user_id'];
}

$user = User::getUserById($user_id);

$picture = EditProfilePicture::binToPicture($user_id);
?>

<div class="container-fluid bg-dark-subtle p-4 rounded-2 shadow-sm">
    <h5>Account Info</h5>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/account_info/edit_username.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="text" class="form-control" id="floatingInput" name="username" value="<?php
                echo $user->getUsername(); ?>">
                <label for="floatingInput">Username:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <form action="../../../../User/logic/edit_profile/account_info/edit_email.php" method="post" class="d-flex gap-4">
            <div class="form-floating flex-grow-1">
                <input type="email" class="form-control" id="floatingInput" name="email" value="<?php
                echo $user->getEmail(); ?>">
                <label for="floatingInput">Email:</label>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <div class="mt-4">
        <label for="password" class="form-label">Password:</label>
        <a href="/resources/views/user/edit_profile/edit_password.php" class="nav-item nav-link text-primary d-inline-block">Change Password</a>
    </div>

</div>
