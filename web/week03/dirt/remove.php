<?php session_start(); 
    if(isset($_SESSION["cart"])) {
        array_splice($_SESSION["cart"], (int)$_GET["index"]);
        header("Location: https://uroboros-grey.herokuapp.com/week03/dirt/view_cart.php");
        die();
    } else {
        $_SESSION["cart"] = [];
    }
?>
