<?php

    // configuration
    require_once("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("body/historyView.php", ["title" => "Register"]);
    }
?>