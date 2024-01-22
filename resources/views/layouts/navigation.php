<?php

$user_id = $_SESSION['user_id'];
$user = EditProfilePicture::getUserById($user_id);


?>
<style>
    .navbar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .user-profile {
        display: flex;
        align-items: center;
    }

    .user-profile img {
        margin-right: 10px;
    }
</style>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                GK
            </a>
        </div>
        <div class="user-profile">
            <a href="/resources/views/user/profile.php">
                <?php if ($user->getPicture() == null) : ?>
                    <img src="/public/images/UserImage.png" alt="profile_avatar" width="40" height="40" class="rounded shadow">
                <?php else : ?>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $picture; ?>" alt="profile_avatar" width="40" height="40" class="rounded shadow">
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="padding-inline: 6px;">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <?php
                if (!$user->getFullName()) { ?>
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Geeks Krug</h5>
                <?php
                } else { ?>
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?php
                                                                            echo $user->getFullName() ?></h5>
                <?php
                } ?>

                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php
                    if (!$user->getUserTypeId() === 2) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/resources/views/auth/login.php">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/resources/views/auth/signup.php">Sign up</a>
                        </li>
                    <?php
                    } else { ?>
                        <li><a href="/resources/views/blog/create_blog.php" class="nav-link">Create blog</a></li>
                        <li><a href="/resources/views/user/edit_profile/edit_profile.php" class="nav-link">Edit profile</a></li>
                        <li><a href="../../../User/logic/auth/logout.php" class="nav-link">Logout</a></li>
                    <?php
                    } ?>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>
