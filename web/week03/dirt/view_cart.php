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
            <?php 
                if(isset($_SESSION["cart"])) {
                    $count = 0;
                    foreach ($_SESSION["cart"] as $block) { 
                        echo '<tr><td>'.ucfirst($block).'</td><td><a href="#" class="btn btn-primary" onclick="remove('.$count.')">Remove</a></td></tr>';
                        $count += 1;
                    } 
                } else { 
                    $_SESSION["cart"] = [];
                } 
            ?>
                    </tbody>
                </table> <a class="btn btn-primary float-right" href="checkout.php">Checkout</a>
                </div>

            <form id="remover" action="remove.php" method="get">
                <input id="index" type="hidden" name="index" value="" />
            </form>
            
           
        </main>
    </body>
    <script src="script.js"></script>
</html>

