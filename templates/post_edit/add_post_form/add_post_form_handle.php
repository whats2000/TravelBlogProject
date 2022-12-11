<?php
session_start();
if (!isset($_SESSION["user"])) {
    exit();
}
include("../../core/config.php");

$return_msg = "";

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}
$url = "../../index.php";

if (isset($_POST["image"])) {

    $data = $_POST["image"];

    $dir = "static/images/blog_post/upload/";

    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    $image_name = "post_" . $_SESSION["profile"]["id"]
        . "_pic_" . time() . ".png";

    file_put_contents($image_name, $data);

    if (!file_exists("../../../" . $dir)) {
        mkdir("../../../" . $dir, 0777, true);
    }

    rename($image_name, "../../../" . $dir . $image_name);

    $_SESSION["post"]["upload-picture"] = $image_name;
    echo '<img src="../' . $dir . $image_name . '" class="img-thumbnail" />';
}
if (isset($_POST["save-add-post"])) {
    //INSERT email, name, title, description, create_at upload
    $email = $_SESSION['profile']['email'];
    $title = $_POST["title"];
    $description = $_POST["description"];
    date_default_timezone_set("Asia/Taipei");
    $datetime = date("Y-m-d H:i:s");
    $temp_pic_name = uniqid("PIC-", true);
    $add_post = $sql_link->exec("INSERT INTO post(email, picture, title, description, create_at) VALUES('$email', '$temp_pic_name','$title', '$description', '$datetime')");

    if (isset($_SESSION["post"]["upload-picture"])) {

        $post_id = $sql_link->query("SELECT id FROM post WHERE picture='$temp_pic_name'");
        $post_id = $post_id->fetch(PDO::FETCH_ASSOC); //turn php object into array
        $post_id = implode($post_id);

        $image_name = $_SESSION["post"]["upload-picture"];

        $dir_original = "static/images/blog_post/upload/";
        $dir_target = "static/images/blog_post/post/";

        if ($_SESSION["post"]["picture"] != "") {
            if (file_exists("../../../" . $dir_target . $_SESSION["post"]["picture"])) {
                unlink("../../../" . $dir_target . $_SESSION["post"]["picture"]);
            }
        }
        $sql = "UPDATE `post` 
            SET `picture`='$image_name'
            WHERE `id`='$post_id'";

        if ($sql_link->exec($sql)) {
            $_SESSION["post"]["picture"] = $image_name;
            $return_msg = "Upload successfully";
        } else {
            $return_msg = "Fail to upload post image";
        }

        rename(
            "../../../" . $dir_original . $image_name,
            "../../../" . $dir_target . $image_name
        );

        $files = glob("../../../" . $dir_original . '/*'); //遞迴取得子資料夾 | 檔名不含路徑
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
?>
    <script>
        window.location.href = "../../posts/post_handle.php";
    </script>
<?php
}
if (isset($_POST["cancel-save"])) {
    $dir = "static/images/blog_post/upload/";

    $files = glob("../../../" . $dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    } ?>
    <script>
        window.location.href = "../../index.php";
    </script>
<?php
}

if ($return_msg != "") {
    $_SESSION["show_message"] = $return_msg;
}

exit();
?>