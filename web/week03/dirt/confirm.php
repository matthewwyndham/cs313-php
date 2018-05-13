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
                <p>We provide for all your standard Minecraft block needs!</p>
            </div>
                <div class="container">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Purchased Blocks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_SESSION["cart"])) {
                                    foreach ($_SESSION["cart"] as $block) { 
                                        echo '<tr><td>'.ucfirst($block).' x64</td></tr>';
                                    } 
                                } else { 
                                    $_SESSION["cart"] = [];
                                } 
                            ?>
                    </tbody>
                </table>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Address</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php 
                                echo '<tr><td>Address</td>
                                <td>'.htmlspecialchars($_GET["add1"]).'</td>
                                </tr>';
                                echo '<tr><td>Address 2</td>
                                <td>'.htmlspecialchars($_GET["add2"]).'</td>
                                </tr>';
                                echo '<tr><td>City</td>
                                <td>'.htmlspecialchars($_GET["city"]).'</td>
                                </tr>';
                                echo '<tr><td>State</td>
                                <td>'.htmlspecialchars($_GET["state"]).'</td>
                                </tr>';
                                echo '<tr><td>Zip Code</td>
                                <td>'.htmlspecialchars($_GET["zip"]).'</td>
                                </tr>';
                            ?>
                        </tbody>
                    </table>
                    <a class="btn btn-primary float-right" href="/week03/store.php">Return to Browse</a>
            </div>    <script src="script.js"></script>

        </main>
    </body>
</html>