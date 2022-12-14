<?php
include '../core/config.php';

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}

$sql = "SELECT * FROM `post` ORDER BY `id` DESC LIMIT 6";

$result = $sql_link->query($sql);

$i = 0;
$post_list = array();

while ($row = $result->fetch()) {
    $post_list[$i] = [
        "id" => $row["id"],
        "title" => $row["title"]
    ];

    $i++;
}
?>
<section id="index-footer" class="border-top">
    <div class="container px-5">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-1 col-sm-2">
                <h5 class="fst-italic"><a href="index.php">Home</a></h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="index.php#index-about" class="nav-link p-0">About</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="index.php#index-post" class="nav-link p-0">Explore</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="index.php#index-tips" class="nav-link p-0">Tips</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-4">
                <h5 class="fst-italic"><a href="post1.php">Explore</a></h5>
                <ul>
                    <form class="row" action="post/post_handle.php">
                        <li class="col">
                            <ul class="nav flex-column">
                                <?php for ($a= 0; $a < 3; $a++) {?>
                                <li class="nav-item mb-1">
                                    <button name="id" class="nav-link p-0 border-0 bg-transparent"
                                        value="<?=$post_list[$a]["id"]?>">
                                        <a><?=$post_list[$a]["title"]?></a>
                                    </button>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                        <li class="col">
                            <ul class="nav flex-column">
                                <?php for ($a= 3; $a < 6; $a++) {?>
                                <li class="nav-item mb-1">
                                    <button name="id" class="nav-link p-0 border-0 bg-transparent"
                                        value="<?=$post_list[$a]["id"]?>">
                                        <a><?=$post_list[$a]["title"]?></a>
                                    </button>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                    </form>
                </ul>
            </div>

            <div class="col-lg-4 col-sm-6">
                <h5 class="fst-italic"><a href="tips.php">Tips</a></h5>
                <ul class="row">
                    <li class="col">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a href="tips.php#luggage" class="nav-link p-0">Luggage</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tips.php#plan" class="nav-link p-0">Plan</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tips.php#transportation" class="nav-link p-0">Transportation</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tips.php#food" class="nav-link p-0">Food</a>
                            </li>
                        </ul>
                    </li>
                    <li class="col">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a href="tips.php#weather" class="nav-link p-0">Weather</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tips.php#health-and-safety" class="nav-link p-0">Health &
                                    Safety</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tips.php#lodge" class="nav-link p-0">Lodge</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="tips.php#morality" class="nav-link p-0">Morality</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


            <div class="col-lg-2 offset-2 d-none d-lg-block text-center">
                <img src="../static/images/icon/icon_white.svg" class="d-block w-100 img-fluid" alt="圖片無法載入">
                <a class="nav-link" href="index.php#index-carousel-travel">
                    <h2>Wanna Go</h2>
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-between py-4 mt-4 border-top">
            <p class="copy-right">&copy; 2022 Wanna Go, Inc. All rights reserved.</p>
            <a class="icon-link" href="https://github.com/whats2000/TravelBlogProject">
                <i class="bi bi-github"></i>
            </a>
        </div>
    </div>
</section>