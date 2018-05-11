<?php session_start(); 
    if(isset($_SESSION["cart"])) {
        $_SESSION["cart"][$_GET['block']] += $_GET['quantity'];
        header('/week03/store.php');
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
