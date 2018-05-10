<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <body>      
        <?php 
            if (isset($_SESSION["count"])) {
                $_SESSION["count"] = $_SESSION["count"] + 1;
                echo $_SESSION["count"];
            }
            else {
                $_SESSION["count"] = 1;
                echo $_SESSION["count"];
            }
        ?>
    </body>
</html>