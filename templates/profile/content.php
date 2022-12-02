<?php
session_start();
if (isset($_SESSION["profile"])) { ?>
<section id="profile-content" class="container p-5">
    <h2 class="pb-4 mb-4 fst-italic border-bottom fs-2 fw-bold">
        Hey, welcome back <?=$_SESSION["profile"]["name"]?>
    </h2>
    <div class="row">
        <div class="col-md-8">
            <div id="nav-content">
                <div id="Overview" class="mb-5 pt-5">
                    <h3>Overview</h3>
                    <p class="lh-base">
                        <strong><?=$_SESSION["profile"]["name"]?></strong> have been member since
                        <strong><?=date('Y-m-d', strtotime($_SESSION["profile"]["create_at"]))?></strong>
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
                <div id="about-me" class="mb-5 pt-5">
                    <h3>About me</h3>
                    <?php if ($_SESSION["profile"]["about"] != "") { ?>
                    <p><?=$_SESSION["profile"]["about"]?></p>
                    <?php } else {?>
                    <p>I am a new blogger here, I glad to learn some new tips around, also thank you for visiting
                        my page.</p>
                    <?php }?>
                </div>
                <div id="my-post" class="mb-5 pt-5">
                    <h3>My post</h3>
                    <div class="card text-center">
                        <div class="card-header">
                            Content
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Oops</h5>
                            <p class="card-text text-center">
                                There is no post here.
                            </p>
                        </div>
                        <div class="card-footer text-muted w-100">
                            <button href="#" class="btn btn-sm btn-secondary">Create one</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 mb-5">
            <nav id="sitcky-posts-nav" class="position-sticky d-none d-md-block">
                <nav class="nav nav-pills flex-column pt-5">
                    <a class="nav-link" href="#Overview">
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