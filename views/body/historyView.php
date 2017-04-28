<?php
    
    if ( ($result = CS50::query("SELECT * FROM url")) == false) {
        echo("<I>An error has occurred... Probably we don't have any url shortened yet..</I>");
    } else {
        echo '<table class = "table table-striped table-bordered">';
            echo '<thead >';
                echo "<tr>";
                    echo "<th width = 15%>Url Origin</th>";
                    echo "<th width = 40%>Url Shortened</th>";
                    echo "<th width = 15%>Date</th>";
                    echo "<th width = 15%>Autor</th>";
                    echo "<th width = 15%>Counter</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                foreach ( $result as $row ){
                    echo "<tr>";  
                        echo "<td width = 15%> ". '<a href="' . $row["url_oficial"] .'">'. $row["url_oficial"] .'</a>' ." </td>";
                        echo "<td width = 40%> " . '<a href="index.php?c=' . $row["url_shortened"] .'">https://ide50-lgcardenas91.cs50.io/index.php?c='. $row["url_shortened"] .'</a>'  . " </td>";
                        echo "<td width = 15%> ".$row["date"]." </td>";
                        echo "<td width = 15%> ".$row["user_email"]." </td>";
                        echo "<td width = 15%> ".$row["counter"]." </td>";
                    echo "</tr>";   
                }
            echo "</tbody>";
        echo "</table>";
    }
    
?>