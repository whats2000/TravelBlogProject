<?php
session_start();
if (isset($_SESSION["user_intro"])) { ?>
<section id="profile-content" class="container p-5">
    <h2 class="pb-4 mb-4 fst-italic border-bottom fs-2 fw-bold">
        This is  <?=$_SESSION["user_intro"]["name"]?>'s profile
    </h2>
    <div class="row">
        <div class="col-md-8">
            <div id="nav-content">
                <div id="overview" class="mb-5 pt-5">
                    <h3>Overview</h3>
                    <p class="lh-base">
                        <strong><?=$_SESSION["user_intro"]["name"]?></strong> have been member since
                        <strong><?=date('Y-m-d', strtotime($_SESSION["user_intro"]["create_at"]))?></strong>
                    </p>
                    <P class="lh-base">
                        You have already crate <strong>0</strong> blog contain, in the past time.
                        What a wonderful work, keep going!
                    </P>
                    <P class="lh-base">
                        Also you have give great comment to others, you have <strong>0</strong> comments which are
                        impressive to
                        anyone!
                    </P>
                </div>
                <div id="about-me" class="article-text mb-5 pt-5">
                    <h3>About me</h3>
                    <?php if ($_SESSION["user_intro"]["about"] != "") { ?>
                    <p><?=$_SESSION["user_intro"]["about"]?></p>
                    <?php } else {?>
                    <p>I am new here, thank you for visiting my page!</p>
                    <?php }?>
                </div>
                <div id="my-post" class="mb-5 pt-5">
                    <h3>My post</h3>
                    <div class="card text-center">
                        <div class="card-header">
                            Content
                        </div>
                        <?php
                        if($_SESSION["user_intro_prow"] == 0){
                        ?>
                        <div class="card-body">
                            <h5 class="card-title">Oops</h5>
                            <p class="card-text text-center">
                                There is no post here.
                            </p>
                        </div>
                        <?php
                        }
                        else{
                            foreach($_SESSION["user_intro_post"] as $content){
                        ?>
                        <a href="./search/searchconnection.php?post=<?=$content["id"]?>">
                            <div class="card-body">
                                <p class="card-title"><?=$content["title"]?></p>
                                <p class="card-text text-center">
                                <?=$content["description"]?>
                            </p>
                            </div>
                        </a>
                        <?php
                            }    
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 mb-5">
            <nav id="sitcky-posts-nav" class="position-sticky d-none d-md-block">
                <nav class="nav nav-pills flex-column pt-5">
                    <a class="nav-link" href="#overview">
                        Overview
                    </a>
                    <a class="nav-link" href="#about-me">
                        About me
                    </a>
                    <a class="nav-link" href="#my-post">
                        My post
                    </a>
                </nav>
            </nav>
        </div>
    </div>
</section>
<?php }?>