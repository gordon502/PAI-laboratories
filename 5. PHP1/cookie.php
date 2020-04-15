<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            if(isset($_GET["utworzCookie"])) {
                setcookie("ciacho", "eleganckie", time() + $_GET["czas"], "/");
                echo "Dobre ciacho <br>";
            }
        ?>
        <a href="index.php">Wstecz</a>
    </body>
</html>