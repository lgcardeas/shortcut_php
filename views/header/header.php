<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>UrlShortener: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>UrlShortener</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="UrlShortener_logo" src="/img/shortener_logo_1.png"/></a>
                </div>
                    <ul class="nav nav-pills">
                        <li><a href="quote.php">Shortener</a></li>
                        <li><a href="buy.php">About</a></li>
                    <?php if (!empty($_SESSION["id"])): ?>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    <?php endif ?> 
                    <?php if (empty($_SESSION["id"])): ?>
                        <li><a href="login.php"><strong>Log In</strong></a></li>
                        <li><a href="register.php"><strong>Register</strong></a></li>
                    <?php endif ?> 
                    </ul>
            </div>

            <div id="middle">
