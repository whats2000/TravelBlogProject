<?php

include("../core/config.php");
session_start();

$return_msg = "";

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}

if (@$_POST) {
    $email = $_POST["email"];
    $password = $_POST["password"];
}


if (@$_GET["method"] == "logout") {
    $return_msg = "Logout successfully";
    unset($_SESSION["user"]);
}

if (@$_POST["method"] == "login") {
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = $sql_link->query($sql);

    if ($result) {
        $num = $result->rowCount();
        if ($num == 0) {
            $return_msg = "Can not find membership for this user";
        } else {
            $row = $result->fetch();
            if ($row["password"] == $password) {
                // 將會員名稱存入session
                $_SESSION["user"] = ["name" => $row["name"],
                                     "email" => $row["email"],
                                     "icon" => $row["icon"],
                                     "permission" => $row["permission"]];
                $return_msg = "Login successfully";
            } else {
                $return_msg = "Password or email is incorrect";
            }
        }
    } else {
        $return_msg = "Fail to deal with this cast";
    }
} elseif (@$_POST["method"] == "signup") {
    $name = $_POST["name"];

    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = $sql_link->query($sql);

    if ($result) {
        $num = $result->rowCount();
        if ($num == 0) {
            $current_time = date('d-m-y h:i:s');
            $sql = "INSERT INTO `user` (`name`, `email`, `password`, `create_at`) 
                    VALUES ('$name', '$email', '$password', '$current_time')";

            if ($sql_link->exec($sql)) {
                $return_msg = "Sign up successfully";
                // 將會員名稱存入session
                $_SESSION["user"] = ["name" => $name,
                                     "email" => $email,
                                     "icon" => "default",
                                     "permission" => "user"];
            } else {
                $return_msg = "Fail to deal with this cast";
            }
        } else {
            $return_msg = "This email have already sign up, please use other email";
        }
    } else {
        $return_msg = "Fail to deal with this cast";
    }
}

if (isset($_SESSION["last_url"])) {
    $url = $_SESSION["last_url"];
} else {
    $url = "../index.php";
}

$_SESSION["show_message"] = $return_msg;

?>
<script>
window.location.href = '<?=$url?>';
</script>

<?php exit(); ?>