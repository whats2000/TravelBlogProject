<?php
session_start();

if (!isset($_SESSION["profile"])) {?>
<script>
window.location.href = './profile_edit/profile_edit_handle.php';
</script>
<?php }
$_SESSION['last_url'] = "{$_SERVER['PHP_SELF']}";


if (isset($_SESSION["profile"]["about"])) {
    $about = $_SESSION["profile"]["about"];
} else {
    $about = "<p>I am a new blogger here, 
    I glad to learn some new tips around, 
    also thank you for visiting my page.</p>";
}
?>

<!DOCTYPE html>
<html lang="en-us">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>WannaGo &raquo; Profile &raquo; Edit</title>

    <link href="../static/images/icon/icon.svg" rel="icon" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script src="../scripts/ckeditor/ckeditor.js"></script>

    <script src="../scripts/index_nav.html.js"></script>
    <script src="../scripts/include_HTML.js"></script>
    <script src="../scripts/profile_edit/icon_edit.js"></script>
    <script src="../scripts/password_validation.js"></script>

    <link href="../static/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <?php include __DIR__ . '/profile_edit/icon_edit/icon_form.php';?>
        <?php include __DIR__ . '/profile_edit/icon_edit/icon_form_crop.php';?>
        <?php include __DIR__ . '/profile_edit/name_edit/name_form.php';?>
        <?php include __DIR__ . '/profile_edit/about_edit/about_form.php';?>
        <?php include(__DIR__ . '/core/navbar.php');?>

        <div include-html="profile_edit/topic.php">
        </div>
    </header>

    <main>
        <?php include(__DIR__ . '/profile_edit/content.php');?>
    </main>

    <footer>
        <div include-html="core/footer.php">
        </div>
    </footer>
</body>

</html>

<script>
includeHTML();

// image crop jquery from https://youtu.be/pVatkCgU-Rg
$(document).ready(function() {
    $('#modal-show-message').modal('show');

    CKEDITOR.replace("about-article", {
        height: "200px"
    });

    CKEDITOR.instances["about-article"].setData('<?=json_encode($about);?>'.slice(1, -1));
});

const myModalAlternative = new bootstrap.Modal('#about-form', {
    focus: false
})
</script>