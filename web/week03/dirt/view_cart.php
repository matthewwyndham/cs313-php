<?php session_start(); 
    if(isset($_SESSION["cart"])) {
       foreach ($_SESSION["cart"] as $block) {
           echo '<p>'.$block.'</p';
       }
    } else {
        $_SESSION["cart"] = [];
    }
?>