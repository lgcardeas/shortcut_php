<?php

    // configuration
    require_once("../includes/config.php"); 

    if (isset($_GET['c'])){
        $code = $_GET["c"];

        try {
            $url = ShortUrl::shortCodeToUrl($code);
            header("Location: " . $url);
            exit;
        } catch (Exception $e) {
            apology("log exception and then redirect to error page.");
        }
    } else {
        // render shortenerView if we aren't using a short URL
        render("body/shortenerView.php", [""]);
    }

?>
