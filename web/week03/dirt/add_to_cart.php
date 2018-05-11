<?php session_start(); 
    if(isset($_SESSION["cart"])) {
        $_SESSION["cart"][htmlspecialchars($_GET["block"])] += htmlspecialchars($_GET["quantity"]);
        header('https://uroboros-grey.herokuapp.com/week03/store.php');
        die();
    } else {
        $_SESSION["cart"] = [
            'clay'=>0,
            'diorite'=>0,
            'grass'=>0,
            'obsidian'=>0,
            'quartz'=>0,
            'sand'=>0,
            'price'=>0
        ];
    }
?>
