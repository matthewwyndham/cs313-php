<?php session_start(); ?>
<?php
    if(isset($_SESSION["cart"])) {
        ($_SESSION["cart"][(int)$_GET["index"]] = NULL;
        header("Location: https://uroboros-grey.herokuapp.com/week03/dirt/view_cart.php");
        die();
    } else {
        $_SESSION["cart"] = [];
        header("Location: https://uroboros-grey.herokuapp.com/week03/dirt/view_cart.php");
        die();
    }
?>
