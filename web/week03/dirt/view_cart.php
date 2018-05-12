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
            <div class="container">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Block</th>
                            <th>Remove?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Clay</td>
                            <td><img src="dirt/img/clay.png" class="rounded" alt="clay"></td>
                            <td>64 blocks per <img src="dirt/img/gold.png"/ width="20px"></td>
                            <td><a href="#" class="btn btn-primary" onclick="add('clay', 64)">Add to Cart</a></td>
                        </tr>
            <?php 
                if(isset($_SESSION["cart"])) {
                    $count = 0;
                    foreach ($_SESSION["cart"] as $block) { 
                        echo "<tr><td>$block</td><td><a href=\"#\" class=\"btn btn-primary\" onclick=\"remove($count)\">Remove</a></td></tr>";
                        $count += 1;
                    } 
                } else { 
                    $_SESSION["cart"] = [];
                } 
            ?>
                    </tbody>
                </table>
                </div>

            <a class="btn btn-success" href="checkout.php">Checkout</a>
            <form id="remover" action="remove.php" method="get">
                <input id="index" type="hidden" name="block" value="" />
            </form>
            
        </main>
    </body>
    <script src="script.js"></script>
</html>

