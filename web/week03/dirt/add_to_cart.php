<?php session_start(); 
    if(isset($_SESSION["cart"])) {
        array_push($_SESSION["cart"], $_GET["block"]);
        header('https://uroboros-grey.herokuapp.com/week03/store.php');
        die();
    } else {
        $_SESSION["cart"] = [];
    }
?>
