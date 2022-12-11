<?php
session_start();
include "../core/config.php";
$sql_link = connect("root", "");
$position = $_POST['pos'];
$post = $_POST['post'];
$sql = "SELECT * FROM `article` WHERE `for_post` = '$post'";
$result = $sql_link->query($sql);
$rowcount = $result->rowCount();
$_SESSION['exec_msg'] = NULL;
if ($_POST['action'] == "delete") {
    $sql = "DELETE FROM `article` WHERE `position` = '$position' AND `for_post` = '$post'";
    $sql_link->exec($sql);
    for ($i = $position; $i < $rowcount; $i++) {
        $new_position = $i + 1;
        $sql = "UPDATE `article` SET `position` = '$i' WHERE `for_post` = '$post' AND `position` = '$new_position'";
        $sql_link->exec($sql);
    }
    $_SESSION['exec_msg'] = "complete.";
} else if ($_POST['action'] == "move_up") {
    if ($position == 1) {
        $_SESSION['exec_msg'] = "already at top.";
    } else {
        $sql = "SELECT * FROM `article` WHERE `position` = '$position' AND `for_post` = '$post'";
        $result = $sql_link->query($sql);
        $row = $result->fetch();
        $temp = $row['id'];
        $new_position = $position - 1;
        $sql = "UPDATE `article` SET `position` = '$position' WHERE `for_post` = '$post' AND `position` = '$new_position'";
        $sql_link->exec($sql);
        $sql = "UPDATE `article` SET `position` = '$new_position' WHERE `for_post` = '$post' AND `id` = '$temp'";
        $sql_link->exec($sql);
        $_SESSION['exec_msg'] = "complete.";
    }
} else if ($_POST['action'] == "move_down") {
    if ($position == $rowcount) {
        $_SESSION['exec_msg'] = "already at bottom.";
    } else {
        $sql = "SELECT * FROM `article` WHERE `position` = '$position' AND `for_post` = '$post'";
        $result = $sql_link->query($sql);
        $row = $result->fetch();
        $temp = $row['id'];
        $new_position = $position + 1;
        $sql = "UPDATE `article` SET `position` = '$position' WHERE `for_post` = '$post' AND `position` = '$new_position'";
        $sql_link->exec($sql);
        $sql = "UPDATE `article` SET `position` = '$new_position' WHERE `for_post` = '$post' AND `id` = '$temp'";
        $sql_link->exec($sql);
        $_SESSION['exec_msg'] = "complete.";
    }
}
?>
<?= $_SESSION['exec_msg'] ?>