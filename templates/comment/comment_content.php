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
        $i=0;
        foreach ($result_comment as $comment) {
            $i++;
            if($i==4){
                ?>
                <button class="btn btn-dark col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetarget" aria-expanded="false" aria-controls="collapsetarget">
                Click to see more!
                </button>
                <br>
                <div class="collapse" id="collapsetarget">
                <?php
                
            }
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
<div class="card my-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <img src="<?=$icon?>" alt="avatar" width="25" height="25" />
                <p class="card-title px-3 mt-2"><?=$comment["name"]?></p>
            </div>
        </div>
        <p class="col-12 lh-base"><b><?=$comment["content"]?></b></p>
    </div>
</div>
<?php
                } else {//those comment they can edit
                    ?>
<div class="card my-2">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center card-title">
                <img src="<?=$icon?>" alt="avatar" width="25" height="25" />
                <p class=" px-3 mt-2" id=<?=$content_tag_id?>><?=$comment["name"]?></p>
            </div>
        </div>
        <div class="d-flex justify-content-between card-text">
            <p class="col-12 lh-base"><b><?=$comment["content"]?></b></p>
        </div>
        <form class="float-end" action="./comment/comment_delete.php" method="post">
            <input type="hidden" name="comment_id" value="<?=$comment["id"] ?>">
            <input type="hidden" name="comment_email" value="<?=$comment["email"] ?>">
            <input type="hidden" name="post_id" value="<?=$_SESSION["post"]["id"] ?>">
            <button type="submit" class="btn btn-light btn-sm"><i class="bi bi-trash"></i></button>
        </form>
    </div>
</div>
<?php

                }
            } else {
                ?>
<div class="card my-2 ">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
                <img src="<?=$icon?>" alt="avatar" width="25" height="25" />
                <p class="card-title"><?=$comment["name"]?></p>
            </div>
        </div>
        <p class="col-12 lh-base"><b><?=$comment["content"]?></b></p>
    </div>
</div>
<?php
            }
        if($i==$rowcount_comment){
            ?>
            </div>
            <?php
            
        }
        }
    }
}
?>