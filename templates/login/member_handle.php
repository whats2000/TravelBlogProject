<?php

include("../core/config.php");
session_start();

$return_msg = "";

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}

// Validate the data from https://www.w3schools.com/php/php_form_complete.asp
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (@$_POST) {
    $email = $_POST["email"];
    $password = $_POST["password"];
}


if (@$_GET["method"] == "logout") {
    $return_msg = "Logout successfully";
    unset($_SESSION["user"]);
    unset($_SESSION["profile"]);
    unset($_SESSION["post"]);
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
                $_SESSION["user"] = [
                    "name" => $row["name"],
                    "email" => $row["email"],
                    "icon" => $row["icon"],
                    "permission" => $row["permission"]
                ];
                $return_msg = "Login successfully";
            } else {
                $return_msg = "Password or email is incorrect";
            }
        }
    } else {
        $return_msg = "Fail to fetch data from database";
    }
} elseif (@$_POST["method"] == "signup") {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $return_msg = "Invalid email format";
    } else {
        $email = $sql_link->quote($email);
        $email = test_input($_POST["email"]);
        $name = $_POST["name"];

        $sql = "SELECT * FROM `user` WHERE `email` = $email";
        $result = $sql_link->query($sql);

        if ($result) {
            $num = $result->rowCount();
            if ($num == 0) {
                date_default_timezone_set('Asia/Taipei');
                $current_time = date('Y-m-d h:i:s');
                $name = $sql_link->quote($name);
                $password = $sql_link->quote($password);
                $sql = "INSERT INTO user (name, email, password, create_at) 
                        VALUES ($name, '$email', $password, '$current_time')";

                if ($sql_link->exec($sql)) {
                    $return_msg = "Sign up successfully";
                    // 將會員名稱存入session
                    $_SESSION["user"] = [
                        "name" => $name,
                        "email" => $email,
                        "icon" => "",
                        "permission" => "user"
                    ];
                } else {
                    $return_msg = "Fail to write data to database";
                }
            } else {
                $return_msg = "This email have already sign up, please use other email";
            }
        } else {
            $return_msg = "Fail to fetch data from database";
        }
    }
}

if (isset($_SESSION["last_url"])) {
    $url = $_SESSION["last_url"];
} else {
    $url = "../index.php";
}

if ($return_msg != "") {
    $_SESSION["show_message"] = $return_msg;
}

?>
<script>
window.location.href = '<?= $url ?>';
</script>

<?php exit(); ?>