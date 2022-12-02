<?php session_start(); ?>
<section id="profile-topic" class="topic-content">
    <img src="../static/images/posts/posts1-1.jpg" class="d-block w-100 h-100 img-fluid" alt="圖片無法載入">
    <div class="img-cover"></div>
    <div class="d-block d-xs-none">
        <figure class="figure">
            <img src="../static/images/icon/person-circle.svg" alt="mdo" class="rounded-circle mx-auto d-block"
                height="100px" width="100px">
            <figcaption class="figure-caption mt-4"><?=$_SESSION["profile"]["name"]?></figcaption>
        </figure>
    </div>
    <div class="d-block d-xs-none">
        <div class="config-button">
            <div class="d-grid mx-auto">
                <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                    <i class="bi me-1 bi-pencil-square fa-lg"></i>
                    Edit Profile
                </button>
            </div>
        </div>
    </div>
</section>