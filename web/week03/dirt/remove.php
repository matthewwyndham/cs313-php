<?php session_start(); ?>
<?php
    if(isset($_SESSION["cart"])) {
        array_splice($_SESSION["cart"],(int)$_GET["index"]);
        header("Location: https://uroboros-grey.herokuapp.com/week03/dirt/view_cart.php");
        die();
    } else {
        $_SESSION["cart"] = [];
        header("Location: https://uroboros-grey.herokuapp.com/week03/dirt/view_cart.php");
        die();
    }
?>
