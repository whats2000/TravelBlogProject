<?php
if (isset($_SESSION["post"]["id"])) {//know to post id
    //form for add
    if (isset($_SESSION['user']['email'])) {//login stat
        $email=$_SESSION['user']['email'];
        ?>
<div class="row mb-5 border">
    <form id="Comments" class="mb-5" action="./comment/comment_add.php" method="post">
        <h3>Comments</h3>
        <div class="mb-3">
            <label for="comment-email" class="form-label">
                Email address
            </label>
            <p><b><?=$email?></b></p>
        </div>
        <div class="mb-3">
            <label for="comment-article" class="form-label">
                Please leave your message here
            </label>
            <textarea class="form-control" id="comment-article" rows="3" placeholder="Welcome to Wanna Go !"
                name="comment_content"></textarea>
        </div>
        <button type="submit" class="btn btn-secondary d-flex float-end">
            Submit
        </button>
    </form>
    <br>
</div>
<?php
    } else {
        ?>
<div class="row mb-3">
    <div id="Comments" class="mb-3">
        <h3>Login to Comment Your Opinion</h3>
    </div>
    <br>
    <hr>
</div>
<?php
    }
    include("../comment/comment_display.php");
    if ($rowcount_comment==0) {
        ?>
<div class="row mb-3">
    <div id="Comments" class="mb-3">
        <h3>There is no comment currently...</h3>
    </div>
    <br>
</div>
<?php
    } else {
        foreach ($result_comment as $comment) {
            if ($comment["icon"] == "") {
                $icon = "../static/images/icon/person-circle-dark.svg";
            } else {
                $icon = "../static/images/user/icon/".$comment["icon"];
            }
            $content_tag_id = "tag_id_".$comment["id"];
            $edit_button_id = "edit_id_".$comment["id"];
            if (isset($_SESSION["user"]["email"])) {
                if ($email!=$comment["email"]) {
                    ?>
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <img src="<?=$icon?>" alt="avatar" width="25" height="25" />
                <p class="card-title px-3 mt-2"><?=$comment["name"]?></p>
            </div>
        </div>
        <p><b><?=$comment["content"]?></b></p>
    </div>
</div>
<?php
                } else {//those comment they can edit
                    ?>
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <img src="<?=$icon?>" alt="avatar" width="25" height="25" />
                <p class="card-title px-3 mt-2" id=<?=$content_tag_id?>><?=$comment["name"]?></p>
                <button id=<?=$edit_button_id?> type="button" class="btn btn-outline-secondary"
                    onclick="edit(<?=$content_tag_id?>,<?=$edit_button_id?>)">edit</button>
            </div>
        </div>
        <p><b><?=$comment["content"]?></b></p>
    </div>
</div>
<?php

                }
            } else {
                ?>
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <img src="<?=$icon?>" alt="avatar" width="25" height="25" />
                <p class="card-title"><?=$comment["name"]?></p>
            </div>
        </div>
        <p><b><?=$comment["content"]?></b></p>
    </div>
</div>
<?php
            }
        }
    }
}
?>