<?php
include __DIR__ . '/../login/login_form.php';
include __DIR__ . '/../login/logout_form.php';
include __DIR__ . '/../login/policy.html';
include __DIR__ . '/../login/show_message.php';
include __DIR__ . '/../login/signin_form.php';

include __DIR__ . '/../post_edit/add_post_form/add_post_form.php';
include __DIR__ . '/../post_edit/add_post_form/add_post_form_crop.php';


if (isset($_SESSION['user']) && ($_SESSION['user']['icon'] != "")) {
    $icon = "../static/images/user/icon/" . $_SESSION['user']['icon'];
} else {
    $icon = "../static/images/icon/person-circle.svg";
}
?>
<nav id="index-navbar" class="navbar navbar-expand-md navbar-dark fixed-top">
    <div id="navbar-content" class="container-fluid">
        <a class="navbar-brand" href="index.php">Wanna Go !</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php#index-about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php#index-post">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#index-tips">Tips</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <form class="me-2 w-100" role="search" action="./search/search_handle.php">
                    <input type="search" class="form-control form-control-sm no-shadowv btn-primary"
                        placeholder="Search..." aria-label="Search" name="search" ?>
                </form>
                <div class="dropdown text-end">
                    <a href="#" class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="<?= $icon ?>" alt="mdo" class="rounded-circle" height="31px" width="31px">
                    </a>
                    <ul class="dropdown-menu text-small dropdown-menu-end mt-2">
                        <?php if (isset($_SESSION["user"])) { ?> <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#add-post-form">New
                                Post...</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./profile/profile_handle.php">Profile</a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-policy">
                                Privacy Policy</a>
                        </li>
                        <?php } ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php if (!isset($_SESSION["user"])) { ?>
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-login">Login</a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-logout">Logout</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a id="to-top-button" href="#" class="top-link">
        <img src="../static/images/icon/arrow-up-circle-fill.svg">
    </a>
</nav>

<script src="../scripts/croppie.js"></script>
<script src="../scripts/post_edit/add_post_form_edit.js"></script>