<?php
session_start();
if (!isset($_SESSION["user"])) {
    exit();
}
include("../core/config.php");

$return_msg = "";

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}
$url = "../index.php";

if (isset($_POST["add_post_upload"])) {
    //INSERT name, title, description, create_at upload
    $title = $_POST["title"];
    $description = $_POST["description"];
    date_default_timezone_set("Asia/Taipei");
    $datetime = date("Y-m-d H:i:s");
    $temp_pic_name = uniqid("PIC-", true);
    $add_post = $sql_link->exec("INSERT INTO post(picture, title, description, create_at) VALUES('$temp_pic_name','$title', '$description', '$datetime')");

    // //UPDATE picture
    // $pic_name = $_FILES["sub_pic"]["name"];
    // $pic_size = $_FILES["sub_pic"]["size"];
    // $tmp_name = $_FILES["sub_pic"]["tmp_name"];
    // $error = $_FILES["sub_pic"]["error"];
    // $allowed_ext = array("jpeg", "jpg", "gif", "png");



    // if ($error === 0) {
    //     if ($pic_size > 125000) { //avoid file is too large
    //         $return_msg = "Sorry, your file is too large.";
    //         $_SESSION["show_message"] = $return_msg;
    //     } else {
    //         $pic_ex = pathinfo($pic_name, PATHINFO_EXTENSION);
    //         $pic_ex_lc = strtolower($pic_ex);

    //         // if (in_array($pic_ex_lc, $allowed_ext)) { //avoid file extension is not a picture
    //             $post_id = $sql_link->query("SELECT id FROM post WHERE picture='$temp_pic_name'");
    //             $post_id = $post_id->fetch(PDO::FETCH_ASSOC);
    //             $post_id = implode($post_id);
    //             //strcmp($post_id['id'], [string]);
    //             $new_pic_name = $post_id . "." . $pic_ex_lc;
    //             $pic_upload_path = "../../static/images/blog_post/post/" . $new_pic_name;
    //             if (move_uploaded_file($tmp_name, $pic_upload_path)) {
    //                 print("success");
    //                 //Insert into database

    //                 $sql = $sql_link->exec("UPDATE post SET picture='$new_pic_name' WHERE id=$post_id");
    //                 print("success");
    //                 header("Location: ../posts/edit_form.php");
    //             }
    //         // } else {
    //         //     print("fail");
    //         //     $return_msg = "You can not upload files of this type";
    //         //     $_SESSION["show_message"] = $return_msg;
    //         // }
    //     }
    // } else { //avoid file is error
    //     $return_msg = "unknown error occurred!";
    //     $_SESSION["show_message"] = $return_msg;
    // }
    $data = $_POST["image"];

    $dir = "static/images/user/upload/";

    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    $image_name = "user_" . $_SESSION["profile"]["id"]
        . "_icon_" . time() . ".png";

    file_put_contents($image_name, $data);

    if (!file_exists("../../../" . $dir)) {
        mkdir("../../../" . $dir, 0777, true);
    }

    rename($image_name, "../../../" . $dir . $image_name);

    $_SESSION["profile"]["upload-icon"] = $image_name;

    echo '<img src="../' . $dir . $image_name . '" class="img-thumbnail" />';
}
if (isset($_POST["save-image"])) {
    if (isset($_SESSION["profile"]["upload-icon"])) {
        $sql_link = connect('root', '');

        if (!$sql_link) {
            $_SESSION["show_message"] = "Error at connect to database";
            exit();
        }

        $user_id = $_SESSION["profile"]["id"];

        $image_name = $_SESSION["profile"]["upload-icon"];

        $dir_original = "static/images/user/upload/";
        $dir_target = "static/images/user/icon/";

        if ($_SESSION["profile"]["icon"] != "") {
            if (file_exists("../../../" . $dir_target . $_SESSION["profile"]["icon"])) {
                //unlink("../../../" . $dir_target . $_SESSION["profile"]["icon"]);
            }
        }

        $sql = "UPDATE `user` 
            SET `icon`='$image_name'
            WHERE `id`='$user_id'";

        if ($sql_link->exec($sql)) {
            $_SESSION["user"]["icon"] = $image_name;
            $return_msg = "Upload successfully";
        } else {
            $return_msg = "Fail to upload icon";
        }

        rename(
            "../../../" . $dir_original . $image_name,
            "../../../" . $dir_target . $image_name
        );

        $files = glob("../../../" . $dir_original . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                //unlink($file);
            }
        }
    }
?>
    <script>
        window.location.href = ' <?= $url ?> ';
    </script>
<?php
}
if (isset($_POST["cancel-save"])) {
    $dir = "static/images/user/upload/";

    // $files = glob("../../../" . $dir . '/*');
    // foreach ($files as $file) {
    //     if (is_file($file)) {
    //         unlink($file);
    //     }
    // } 
?>
    <script>
        window.location.href = ' <?= $url ?> ';
    </script>
<?php
}
if ($return_msg != "") {
    $_SESSION["show_message"] = $return_msg;
}

?>


<?php exit(); ?>