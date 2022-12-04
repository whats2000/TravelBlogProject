<?php
session_start();

if ($_SESSION['profile']['icon'] != "") {
    $icon = "../static/images/user/icon/".$_SESSION['profile']['icon'];
} else {
    $icon = "../static/images/icon/person-circle.svg";
}
?>
<section id="profile-edit-topic" class="topic-content">
    <img src="../static/images/posts/posts1-1.jpg" class="d-block w-100 h-100 img-fluid" alt="圖片無法載入">
    <div class="img-cover"></div>
    <div class="d-block d-xs-none">
        <figure class="figure">
            <div class="image_area">
                <a data-bs-toggle="modal" data-bs-target="#icon-form">
                    <div class="icon d-flex justify-content-center">
                        <img src="<?=$icon?>" alt="mdo" class="rounded-circle d-block" height="100px" width="100px">
                        <i class="rounded-circle text-secondary bi bi-pencil icon-edit text-end"></i>
                    </div>
                </a>

                <a class="border-bottom border-secondary">
                    <figcaption class="figure-caption mt-4">
                        <?=$_SESSION["profile"]["name"]?>
                        <i class="rounded-circle text-secondary bi bi-pencil fs-5"></i>
                    </figcaption>
                </a>
        </figure>
    </div>
    <div class="d-block d-xs-none">
        <div class="config-button">
            <div class="d-grid mx-auto">
                <a class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" href="./profile/profile_handle.php">
                    <i class="bi me-1 bi-arrow-up-square fs-5"></i>
                    Back
                </a>
            </div>
        </div>
    </div>
</section>