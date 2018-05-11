<?php session_start(); 
    if(isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $block) {
            echo "<p>$block : $_SESSION['cart'][$block]</p>"
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