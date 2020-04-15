<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            echo "<h1>Nasz system</h1>";
            if (isset($_POST["wyloguj"])) {
                $_SESSION["zalogowany"] = 0;
            }
        ?>
        <form action="logowanie.php" method="post">
            <fieldset>
                <legend>Dane logowania: </legend>
                Login: <input type="text" name="login"><br>
                Hasło: <input type="password" name="password"><br>
                <input type="submit" name="send" value="Zaloguj">
            </fieldset>
        </form>
        <a href="user.php">user.php</a>
        <form action="cookie.php" method="GET">
            <fieldset>
                <legend>Ciasteczka: </legend>
                <input type="number" name="czas">
                <input type="submit" name="utworzCookie" value="Utwórz cookie">
            </fieldset>
        </form>   
        <?php
            if (isset($_COOKIE["ciacho"])) {
                echo "Cookie: " . $_COOKIE['ciacho']; 
            }
        ?>  
    </body>
</html>