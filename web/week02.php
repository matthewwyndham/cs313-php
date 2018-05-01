<!DOCTYPE html>
<html>
    <head>
        <title>Generate divs!</title>
    </head>
    <body>

        <h1>Div generator</h1>

        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<div id=\"div$i\"";
            if ($i / 2 == 0) {
                echo " style=\"background-color: red;\" ";
            }
            echo "></div>";
        }
        
        ?>

    </body>
</html>