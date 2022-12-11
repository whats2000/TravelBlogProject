<?php
session_start();
$post_description = $_SESSION["post"]["description"];
$article = $_SESSION["article"];
//test
$_SESSION['user']['email'] = "kh0109092@gmail.com";
?>
<section id="posts-content" class="container p-5">
    <h2 class="pb-4 mb-4 fst-italic border-bottom fs-2 fw-bold">
        <?= $post_description ?>
    </h2>
    <div class="row">
        <div class="col-md-8">
            <div id="nav-content">
                <?php foreach ($article as $key => $value) {
                    if ($value["display"] == "normal") { ?>
                        <div id="<?= $value["id"] ?>" class="mb-5 pt-5">
                            <h3><?= $value["title"] ?></h3>
                            <?php if ($value["picture"] != "") { ?>
                                <img src="../static/images/blog_post/article/<?= $value["picture"] ?>" class="d-block w-100 h-100 img-fluid" alt="圖片無法載入">
                            <?php } ?>
                            <div class="lh-base">
                                <?= $value["description"] ?>
                            </div>
                            <small class="text-muted float-end p-2">
                                Last updated at <?= date('Y-m-d', strtotime($value["edit_time"])) ?>
                            </small>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <form action="./post_edit/change.php" method="POST">
                                        <input type="hidden" name="for_post" value="<?= $value['for_post'] ?>">
                                        <input type="hidden" name="position" value="<?= $value['position'] ?>">
                                        <input class="dropdown-item" type="submit" name="delete" value="delete">
                                        <input class="dropdown-item" type="submit" name="move_up" value="move up">
                                        <input class="dropdown-item" type="submit" name="move_down" value="move down">
                                        <input class="dropdown-item" type="submit" name="edit" value="edit">
                                    </form>
                                </ul>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div id="<?= $value["id"] ?>" class="card my-3 border border-start-0 border-end-0 rounded-0">
                            <div class="row g-0 py-4">
                                <div class="col-lg-6">
                                    <img src="../static/images/blog_post/article/<?= $value["picture"] ?>" class="d-block w-100 h-100 img-fluid Wrounded-start" alt="圖片無法載入">
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $value["title"] ?>
                                        </h5>
                                        <div class="card-text lh-base">
                                            <?= $value["description"] ?>
                                        </div>
                                        <p class="card-text lh-base">
                                            <small class="text-muted float-end">
                                                Last updated at <?= date('Y-m-d', strtotime($value["edit_time"])) ?>
                                            </small>
                                        </p>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <form action="./post_edit/change.php" method="POST">
                                                    <input type="hidden" name="for_post" value="<?= $value['for_post'] ?>">
                                                    <input type="hidden" name="position" value="<?= $value['position'] ?>">
                                                    <input class="dropdown-item" type="submit" name="delete" value="delete">
                                                    <input class="dropdown-item" type="submit" name="move_up" value="move up">
                                                    <input class="dropdown-item" type="submit" name="move_down" value="move down">
                                                    <input class="dropdown-item" type="submit" name="edit" value="edit">
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
                <form action="./post/post_handle.php">
                    <input class="btn btn-secondary" type="submit" value="new article">
                </form>
                <form action="./post/post_handle.php">
                    <input class="float-end btn btn-secondary" type="submit" value="complete">
                </form>
            </div>
        </div>
        <div class="col-4 mb-5">
            <nav id="sitcky-posts-nav" class="position-sticky d-none d-md-block">
                <nav class="nav nav-pills flex-column pt-5">
                    <?php foreach ($article as $key => $value) {
                        if ($value["display"] != "card") { ?>
                            <a class="nav-link" href="#<?= $value["id"] ?>">
                                <?= $value["title"] ?>
                            </a>
                    <?php }
                    } ?>
                    <a class="nav-link" href="#Comments">
                        Comments
                    </a>
                </nav>
            </nav>
        </div>
    </div>

    <div class="row mb-5">
        <form id="Comments" class="mb-5" action="" method="post">
            <h3>Comments</h3>
            <div class="mb-3">
                <label for="comment-email" class="form-label">
                    Email address
                </label>
                <input type="email" class="form-control" id="comment-email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="comment-article" class="form-label">
                    Please leave your message here
                </label>
                <textarea class="form-control" id="comment-article" rows="3" placeholder="Welcome to Wanna Go !"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary d-flex float-end">
                Submit
            </button>
        </form>
    </div>
</section>
<!-- <div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-pencil-fill"></i>
    </button>
    <ul class="dropdown-menu">
        <form action="./post_edit/change.php" method="POST">
            <input type="hidden" name="for_post" value="<?= $value['for_post'] ?>">
            <input type="hidden" name="position" value="<?= $value['position'] ?>">
            <input class="dropdown-item" type="submit" name="delete" value="delete">
            <input class="dropdown-item" type="submit" name="move_up" value="move up">
            <input class="dropdown-item" type="submit" name="move_down" value="move down">
            <input class="dropdown-item" type="submit" name="edit" value="edit">
        </form>
    </ul>
</div>
<form action="./post/post_handle.php">
    <input class="btn btn-secondary" type="submit" value="new article">
</form>
<form action="./post/post_handle.php">
    <input class="float-end btn btn-secondary" type="submit" value="complete">
</form> -->