<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id = $_POST["id"];
//     $movie_name = $_POST["movie_name"];
//     $movie_name = $conn->quote($movie_name);
//     $change_movie = $conn->exec("UPDATE movies SET name=$movie_name WHERE id=$id");
// }
include "core/config.php";
include "login/showmessage.php";
session_start();
$conn = connect("root", "");
// if (isset($_POST["upload"])) {
// }
if (isset($_POST["upload"]) /*&& isset($_FILES["sub_pic"])*/) {
    //name, title, description, create_at upload
    $title = $_POST["title"];
    $description = $_POST["description"];
    $title = $conn->quote($title);
    $description = $conn->quote($description);
    date_default_timezone_set("Asia/Taipei");
    $datetime = date("Y-m-d H:i:s");
    //$datetime = $conn->quote($datetime);
    $add_post = $conn->exec("INSERT INTO post(title, description, create_at) VALUES('$title', '$description', '$datetime')");

    //picture upload
    $pic_name = $_FILES["sub_pic"]["name"];
    $pic_size = $_FILES["sub_pic"]["size"];
    $tmp_name = $_FILES["sub_pic"]["tmp_name"];
    $error = $_FILES["sub_pic"]["error"];
    $allowed_ext = array("jpeg", "jpg", "gif", "png");

    //$post_id=$conn->query("SELECT id FROM post");

    if ($error === 0) {
        if ($pic_size > 125000) { //avoid file is too large
            $error_msg = "Sorry, your file is too large.";
            $_SESSION["show_message"] = $error_msg;
        } else {
            $pic_ex = pathinfo($pic_name, PATHINFO_EXTENSION);
            $pic_ex_lc = strtolower($pic_ex);

            if (in_array($pic_ex_lc, $allowed_ext)) { //avoid file extension is not a picture
                $new_pic_name = uniqid("PIC-", true) . "." . $pic_ex_lc;
                $pic_upload_path = "../static/images/posts/" . $new_pic_name;
                if (move_uploaded_file($tmp_name, $pic_upload_path)) {

                    //Insert into database
                    //$newest_data = $conn->query("SELECT id FROM post ORDER BY create_at DESC LIMIT 1");
                    //$sql = $conn->exec("UPDATE post SET picture="$new_pic_name" WHERE id="$newest_data"");
                    // try {
                    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //     $sql = $conn->exec("INSERT INTO post(picture) VALUES("$new_pic_name") ");
                    // } catch (PDOException $ex) {
                    //     echo $ex->getMessage();
                    // }
                }

                //header("Location: add_post.php");
            } else {
                $error_msg = "You can not upload files of this type";
                $_SESSION["show_message"] = $error_msg;
            }
        }
    } else { //avoid file is error
        $error_msg = "unknown error occurred!";
        $_SESSION["show_message"] = $error_msg;
    }
} else { //avoid variable is null
    header("Location: index.php");
}
