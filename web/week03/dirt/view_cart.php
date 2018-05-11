<?php session_start(); 
    if(isset($_SESSION["cart"])) {
        while ($block = current($_SESSION['cart'])) {
            echo key($array).':'.$block.'<br />';
            next($array);
        }
    } else {
        $_SESSION["cart"] = [
            'clay'=>'0',
            'diorite'=>'0',
            'grass'=>'0',
            'obsidian'=>'0',
            'quartz'=>'0',
            'sand'=>'0',
            'price'=>'0'
        ];
    }
?>