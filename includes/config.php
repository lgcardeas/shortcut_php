<?php

    /**
     * config.php
     *
     * Computer Science 50
     * Problem Set 7 modified
     *
     * Configures app.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require_once("helpers.php");
    require_once("shortenerController.php");
    

    // CS50 Library
    require_once("../vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../config.json");

    // enable sessions
    session_start();

?>
