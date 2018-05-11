<?php session_start(); 
    if(isset($_SESSION["cart"])) {
       
    } else {
        $_SESSION["cart"] = [];
    }
?>