<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <?php require 'header.php' ?>
        <main>
            <div class="jumbotron">
                <h1>Dirt Co.</h1>
                <p>Shopping Cart</p>
            </div>
            <?php 
    if(isset($_SESSION["cart"])) {
        $count = 0;
        foreach ($_SESSION["cart"] as $block) { 
            echo "<p class=\"alert dark-alert\" role=\"alert\">$block<a href=\"#\" class=\"btn btn-primary\" onclick=\"remove($count)\">Remove</a></p>";
            $count += 1;
        } 
    } else { $_SESSION["cart"] = [];} 
            ?>
            <a class="btn btn-success" href="checkout.php">Checkout</a>
            <form id="remover" action="remove.php" method="get">
                <input id="index" type="hidden" name="block" value="" />
            </form>
            
        </main>
    </body>
    <script src="script.js"></script>
</html>

