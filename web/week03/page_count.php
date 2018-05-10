<?php session_start(); $c = "count"; ?>
<!DOCTYPE html>
<html>
    <body>   
        <h1>Page Counter</h1>
        <p>You have loaded this page: <?php 
            if (isset($_SESSION[$c])) {
                $_SESSION[$c] = $_SESSION[$c] + 1;
                echo $_SESSION[$c];
            }
            else {
                $_SESSION[$c] = 1;
                echo $_SESSION[$c];
            }
            ?> times!</p>
    </body>
</html>