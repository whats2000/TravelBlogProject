<?php
session_start();
include "../core/config.php";
$sql_link = connect("root", "");
$position = $_POST['position'];
$post = $_POST['for_post'];
$sql = "SELECT * FROM `article` WHERE `for_post` = '$post'";
$result = $sql_link->query($sql);
$rowcount = $result->rowCount();
?>
<?php

if (isset($_POST['delete'])) { ?>
    <?php
    $sql = "DELETE FROM `article` WHERE `position` = '$position' AND `for_post` = '$post'";
    $sql_link->exec($sql);
    ?>
<?php } else if (isset($_POST['move_up'])) { ?>
    <script>
        var con = confirm("are you sure?");
        if (con) {
            <?php
            $sql = "SELECT * FROM `article` WHERE `position` = '$position' AND `for_post` = '$post'";
            $result = $sql_link->query($sql);
            $row = $result->fetch();
            $temp = $row['id'];
            $new_position = $position - 1;
            $sql = "UPDATE `article` SET `position` = '$position' WHERE `for_post` = '$post' AND `position` = '$new_position'";
            $sql_link->exec($sql);
            $sql = "UPDATE `article` SET `position` = '$new_position' WHERE `for_post` = '$post' AND `id` = '$temp'";
            $sql_link->exec($sql);
            ?>
        }
    </script>
<?php } else if (isset($_POST['move_down'])) { ?>
    <script>
        var con = confirm("are you sure?");
        if (con) {
            <?php
            $sql = "SELECT * FROM `article` WHERE `position` = '$position' AND `for_post` = '$post'";
            $result = $sql_link->query($sql);
            $row = $result->fetch();
            $temp = $row['id'];
            $new_position = $position + 1;
            $sql = "UPDATE `article` SET `position` = '$position' WHERE `for_post` = '$post' AND `position` = '$new_position'";
            $sql_link->exec($sql);
            $sql = "UPDATE `article` SET `position` = '$new_position' WHERE `for_post` = '$post' AND `id` = '$temp'";
            $sql_link->exec($sql);
            ?>
        }
    </script>
<?php  } else if (isset($_POST['edit'])) { ?>
    <script>
        alert("edit.");
    </script>
<?php  }
?>

<script>
    alert("in change.");
    alert("for post:<?= $post ?>");
    alert("position:<?= $position ?>");
    alert(<?= $rowcount ?>);
    window.location.href = './post_edit_handle.php';
</script>