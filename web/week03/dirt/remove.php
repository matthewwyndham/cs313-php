<?php session_start(); 
    if(isset($_SESSION["cart"])) {
        unset($_SESSION["cart"][(int)$_GET["index"]]);
        array_values($_SESSION["cart"]);
        header("Location: https://uroboros-grey.herokuapp.com/week03/dirt/view_cart.php");
        die();
    } else {
        $_SESSION["cart"] = [];
    }
?>
