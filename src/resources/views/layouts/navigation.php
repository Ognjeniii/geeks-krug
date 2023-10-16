<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            GK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <?php if (!$_SESSION['full_name']) { ?>
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Geeks Krug</h5>
                <?php } else { ?>
                    <h5 class="offcanvas-title" id="offcanvasNabarLabel"><?php echo $_SESSION['full_name'] ?></h5>
                <?php } ?>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php if (!$_SESSION['user_type_id'] === 2) { ?>
                        <li class="nav-item">
                            <a href="#"><span class="nav-link active"></span> Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/signup">Sign up</a>
                        </li>
                    <?php } else { ?>
                        <li><a href="/edit" class="nav-link">Edit profile</a></li>
                        <li><a href="../../../User/logic/logout.php" class="nav-link">Logout</a></li>
                    <?php } ?>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>
