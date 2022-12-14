<?php

include("../core/config.php");
session_start();

$return_msg = "";

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}

if (isset($_SESSION["user"])) {
    $email = $_SESSION["user"]["email"];
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = $sql_link->query($sql);

    if ($result) {
        $num = $result->rowCount();
        if ($num == 0) {
            $return_msg = "Can not find membership for this user";
        } else {
            $row = $result->fetch();

            $_SESSION["profile"] = ["id" => $row["id"],
                                    "name" => $row["name"],
                                    "email" => $row["email"],
                                    "icon" => $row["icon"],
                                    "about" => $row["about"],
                                    "permission" => $row["permission"],
                                    "create_at" => $row["create_at"]];
        }
    } else {
        $return_msg = "Fail to deal with this cast";
    }
} else {
    $return_msg = "Please login first";
}

if (isset($_SESSION["user"])) {
    $url = "../profile.php";
} else {
    $url = "../index.php";
}

if ($return_msg != "") {
    $_SESSION["show_message"] = $return_msg;
}

if(!isset($_SESSION["user_intro"])){
    $_SESSION["user_intro_id"] = $_SESSION["profile"]["id"];
    ?>
    <script>
    window.location.href = '../user_intro/intro_handle.php';
    </script>
    <?php
}
elseif(($_SESSION["user_intro"]["name"]!=$_SESSION["user"]["name"])){
    $_SESSION["user_intro_id"] = $_SESSION["profile"]["id"];
    ?>
    <script>
    window.location.href = '../user_intro/intro_handle.php';
    </script>
    <?php
}

?>
<script>
window.location.href = '<?=$url?>';
</script>

<?php exit(); ?>