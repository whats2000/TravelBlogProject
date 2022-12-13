<?php
session_start();
include("../core/config.php");

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $return_msg ="";
    $post_id = $_SESSION["post"]["id"];
    $email = $_SESSION["user"]["email"];

    //insert the data to db
    if(!empty($_POST["comment_content"])){
        $sql = "INSERT INTO comment (post_id, email, content) VALUES ($post_id, '$email', '$_POST[comment_content]')";
        if ($sql_link->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $sql_link->error;
        }
    }
    else{
        $return_msg = "Please Enter Something first";
        header("Location: ../post/post_handle.php?post=$post_id");
        exist();
    }
    }
else{
    header("Location: ../index.php");
    exist();
}
if ($return_msg != "") {
    $_SESSION["show_message"] = $return_msg;
}
header("Location: ../post/post_handle.php?post=$post_id");
exist();
?>