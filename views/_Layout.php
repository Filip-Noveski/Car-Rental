<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?= $pageName ?> - Car Rental</title>
    <link rel="stylesheet" type="text/css" href="<?= $root ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= $root ?>/css/style_light.css" id="theme-style" />
</head>
<body>
    <nav>
        <ul class="navbar" id="nav">
            <?php require "Views/Partial/_NavLeft.php"; ?>
            <?php require "Views/Partial/_NavRight.php"; ?>
        </ul>
    </nav>

    <main>
        <?php require "$body"; ?>
    </main>

    <footer class="footer">
        <ul style="margin: 0; padding: 0;">
            <?php require "Views/Partial/_Footer.php"; ?>
        </ul>
    </footer>

    <script tyle="text/javascript" src="<?= $root ?>/js/setTheme.js"></script>
</body>
</html>