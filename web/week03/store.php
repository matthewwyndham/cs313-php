<?php 
    session_start(); 
    if(isset($_SESSION["cart"])) {
        
    } else {
        $_SESSION["cart"] = [];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
    <body>
        <?php require header.php ?>
        <main>
            <input type="hidden" name="item" value="" />
            <h1>Dirt<button onclick="" button></button></h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Block</th>
                        <th>Image</th>
                        <th>Cost</th>
                        <th>Purchase</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Clay</td>
                        <td><img src="dirt/img/clay.png" class="rounded" alt="clay"></td>
                        <td>64 blocks per <img src="dirt/img/gold.png"/ width="20px"></td>
                        <td><a href="#" class="btn btn-primary" onclick="add('clay', 64)"></a></td>
                    </tr>
                    <tr>
                        <td>Diorite</td>
                        <td><img src="dirt/img/diorite.png" class="rounded" alt="diorite"></td>
                        <td>64 blocks per <img src="dirt/img/gold.png"/ width="20px"></td>
                        <td><a href="#" class="btn btn-primary" onclick="add('diorite', 64)"></a></td>
                    </tr>
                    <tr>
                        <td>Grass</td>
                        <td><img src="dirt/img/grass.png" class="rounded" alt="grass"></td>
                        <td>64 blocks per <img src="dirt/img/gold.png"/ width="20px"></td>
                        <td><a href="#" class="btn btn-primary" onclick="add('grass', 64)"></a></td>
                    </tr>
                    <tr>
                        <td>Obsidian</td>
                        <td><img src="dirt/img/obsidian.png" class="rounded" alt="obsidian"></td>
                        <td>8 blocks per <img src="dirt/img/gold.png"/ width="20px"></td>
                        <td><a href="#" class="btn btn-primary" onclick="add('obsidian', 8)"></a></td>
                    </tr>
                    <tr>
                        <td>Quartz</td>
                        <td><img src="dirt/img/quartz.png" class="rounded" alt="quartz"></td>
                        <td>64 blocks per <img src="dirt/img/gold.png"/ width="20px"></td>
                        <td><a href="#" class="btn btn-primary" onclick="add('quartz', 64)"></a></td>
                    </tr>
                    <tr>
                        <td>Sand</td>
                        <td><img src="dirt/img/sand.png" class="rounded" alt="sand"></td>
                        <td>64 blocks per <img src="dirt/img/gold.png"/ width="20px"></td>
                        <td><a href="#" class="btn btn-primary" onclick="add('sand', 64)"></a></td>
                    </tr>
                </tbody>
            </table>
        </main>
        <script src="dirt/script.js"></script>
        </body>
</html>

<!-- 
URLS:
https://www.designbombs.com/best-free-brackets-extensions/
https://github.com/adobe/brackets/wiki/Customize-Your-Code-Font
https://github.com/adobe/brackets/wiki/How-to-Use-Brackets
https://getbootstrap.com/docs/4.1/components/alerts/
https://uroboros-grey.herokuapp.com/comingsoon.html
https://www.w3schools.com/xml/ajax_intro.asp
https://stackoverflow.com/questions/5966746/best-way-to-initialize-empty-array-in-php
https://content.byui.edu/file/14882098-ce1f-44ba-a196-a7aebcb3d5ce/1/week03/prove.html
-->