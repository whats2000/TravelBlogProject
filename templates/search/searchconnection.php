<?php
session_start();
if(isset($_GET["user"])){
    $_SESSION["profile"]=$_GET["user"];
    header("Location: ../user_intro.php?user_intro_id=$_SESSION[profile]");
    exit();
}
elseif(isset($_GET["post"])){
    $_SESSION["post"]["id"]=$_GET["post"];
    print($_SESSION["post"]["id"]);
    header("Location: ../post/post_handle.php");
    exit();
}
else{
    header("Location: ../index.php");
    exit();
}
?>
<?php exit(); ?>