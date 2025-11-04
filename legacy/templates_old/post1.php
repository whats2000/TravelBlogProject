<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
            maximum-scale=1" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>WannaGo &raquo; Hsinchu</title>

    <link href="../../static/images/icon/icon.svg" rel="icon" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css" />

    <!--bootstrap:css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--bootstrap:JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script src="../../scripts/index_nav.html.js"></script>
    <script src="../../scripts/include_HTML.js"></script>
    <script src="../../scripts/password_validation.js"></script>

    <link href="../../static/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <?php include('./core/navbar.php');?>

        <div include-html="posts/topic1.html">
        </div>
    </header>

    <main>
        <div include-html="posts/content1.html">
        </div>
    </main>

    <footer>
        <div include-html="core/footer.php">
        </div>
    </footer>
</body>

</html>

<script>
includeHTML();
</script>