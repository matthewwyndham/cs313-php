<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <body>   
        <h1>Page Counter</h1>
        <p>You have loaded this page: <?php 
            if (isset($_SESSION["count"])) {
                $_SESSION["count"] = $_SESSION["count"] + 1;
                echo $_SESSION["count"];
            }
            else {
                $_SESSION["count"] = 1;
                echo $_SESSION["count"];
            }
            ?> times!</p>
    </body>
</html>