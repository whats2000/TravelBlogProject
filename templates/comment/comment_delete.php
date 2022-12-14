<?php
session_start();
include("../core/config.php");

if(($_SERVER['REQUEST_METHOD'] == 'POST')){
    if(isset($_SESSION["user"])){

        if($_SESSION["user"]["email"]==$_POST["comment_email"]){

            $comment_id = $_POST["comment_id"];
            $sql_del_comment = "DELETE FROM `comment` WHERE `id` = '$comment_id'";
            $sql_link = connect('root', '');
            $sql_link->query($sql_del_comment);

        }
        else{
            $_SESSION["post"]["id"]=$_POST["post_id"];
            header("Location: ../post/post_handle.php");
            exit();
        }
    }
    else{
        $_SESSION["post"]["id"]=$_POST["post_id"];
        header("Location: ../post/post_handle.php");
        exit();
    }
}
else{
    header("Location: ../index.php");
    exit();
}
$_SESSION["post"]["id"]=$_POST["post_id"];
header("Location: ../post/post_handle.php");
exit();
?>