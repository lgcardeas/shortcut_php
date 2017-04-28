<?php

    // configuration
    require_once("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("body/shortenerView.php", ["title" => "shortenerView"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST["url"]) && isset($_POST["comment"]) && !empty($_POST["url"]) && !empty($_POST["comment"])){
            
            $code = ShortUrl::urlToShortCode($_POST["url"]);
            render("body/historyView.php", ["title" => "History"]);
        } else {
            apologize("An error has occurred.. You should input a valid URL and a comment about this url.");
        }
    } else {
            apologize("An error has occurred.. Please provide valid information");
    }
    

?>