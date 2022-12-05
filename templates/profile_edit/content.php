<?php
session_start();
if (isset($_SESSION["profile"])) { ?>
<section id="profile-edit-content" class="container p-5">
    <h2 class="pb-4 mb-4 fst-italic border-bottom fs-2 fw-bold">
        Hey, welcome back <?=$_SESSION["profile"]["name"]?>
    </h2>

    <div class="row">
        <div class="col-md-8">
            <div id="nav-content">
                <div id="about-me" class="mb-5 pt-5" data-bs-toggle="modal" data-bs-target="#about-form">
                    <div class="align-middle">
                        <h3>About me</h3>
                    </div>
                    <div class="card text-center">
                        <div class="card-header">
                            Content
                        </div>
                        <div class="card-body">
                            <div class="card-text text-center">
                                <?php if ($_SESSION["profile"]["about"] != "") { ?>
                                <?=$_SESSION["profile"]["about"]?>
                                <?php } else {?>
                                <p>I am a new blogger here, I glad to learn some new tips around, also thank you for
                                    visiting
                                    my page.</p>
                                <?php }?>
                            </div>
                        </div>
                        <div class="card-footer text-muted w-100">
                            <button href="#" class="btn btn-sm btn-secondary">
                                Edit <i class="rounded-circle bi bi-pencil icon-edit text-end fs-6 ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 mb-5">
            <nav id="sitcky-posts-nav" class="position-sticky d-none d-md-block">
                <nav class="nav nav-pills flex-column pt-5">
                    <a class="nav-link" href="#about-me">
                        About me
                    </a>
                </nav>
            </nav>
        </div>
    </div>
</section>
<?php }?>