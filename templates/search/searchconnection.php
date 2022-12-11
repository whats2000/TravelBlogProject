<?php
session_start();
if(isset($_GET["user"])){
    $_SESSION["profile"]=$_GET["user"];
    header("Location: ../profile.php");
}
elseif(isset($_GET["post"])){
    $_SESSION["post"]["id"]=$_GET["post"];
    print($_SESSION["post"]["id"]);
    header("Location: ../post/post_handle.php");
}
else{
    header("Location: ../index.php");
}
?>
<?php exit(); ?>