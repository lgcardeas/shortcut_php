<?php
    if ( isset($_POST["symbol"])){
        $stock = lookup($_POST["symbol"]);
        if ($stock != NULL){
            echo $stock["name"] . "(" . $stock["symbol"] . ")" . " costs <B><I> $" . $stock["price"] . "</I></B>.";
        } else {
            $symbol = $_POST["symbol"] == "" ? "NON-NAME" : $_POST["symbol"];
            echo "<B><I> No information was found about this symbol (". $symbol . ")</I></B>";
        }
    }
?>