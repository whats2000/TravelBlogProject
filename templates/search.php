<?php
session_start();
$_SESSION['last_url'] = "{$_SERVER['PHP_SELF']}";
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,
            maximum-scale=1" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>WannaGo &raquo; Tips</title>

    <link href="../static/images/icon/icon.svg" rel="icon" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script src="../scripts/index_nav.html.js"></script>
    <script src="../scripts/include_HTML.js"></script>

    <link href="../static/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <?php include('./core/navbar.php');?>
        </div>

        <div include-html="index/carousel.html">
        </div>
    </header>

    <main>
        <?php include('./search/searchcontent.php');?>
        </div>
        <div include-html="index/post.html">
        </div>
    </main>

    <footer>
        <?php include('./core/footer.php');?>
        </div>
    </footer>
</body>

</html>

<script>
includeHTML();

$(document).ready(function() {
    $('#modal-show-message').modal('show');
});
</script>