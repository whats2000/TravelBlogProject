<head>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<?php
session_start();
$position = $_POST['position'];
$post = $_POST['for_post'];

if (isset($_POST['delete'])) { ?>
    <script>
        var con = confirm("are you sure?");
        if (con) {
            $.ajax({
                type: 'POST',
                url: './action.php',
                data: {
                    "action": "delete",
                    "post": <?= $post ?>,
                    "pos": <?= $position ?>
                },
                success: function(data) {
                    alert(data);
                }
            });
        } else {
            alert("canceled.");
        }
    </script>

<?php } else if (isset($_POST['move_up'])) { ?>
    <script>
        var con = confirm("are you sure?");
        if (con) {
            $.ajax({
                type: 'POST',
                url: './action.php',
                data: {
                    "action": "move_up",
                    "post": <?= $post ?>,
                    "pos": <?= $position ?>
                },
                success: function(data) {
                    alert(data);
                }
            });
        } else {
            alert("canceled.");
        }
    </script>
<?php } else if (isset($_POST['move_down'])) { ?>
    <script>
        var con = confirm("are you sure?");
        if (con) {
            $.ajax({
                type: 'POST',
                url: './action.php',
                data: {
                    "action": "move_down",
                    "post": <?= $post ?>,
                    "pos": <?= $position ?>
                },
                success: function(data) {
                    alert(data);
                }
            });
        } else {
            alert("canceled.");
        }
    </script>
<?php  } else if (isset($_POST['edit'])) { ?>
    <script>
        alert("edit.");
    </script>
<?php  } ?>
<script>
    window.location.href = './post_edit_handle.php';
</script>