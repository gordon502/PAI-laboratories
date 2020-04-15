<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            if ($_SESSION["zalogowany"] != 1) {
                header("Location: index.php");
            }
            require_once("funkcje.php");
            echo "Zalogowano <br>";
            echo $_SESSION["zalogowanyImie"] . "<br>";
        ?>
        <a href="index.php">index.php</a><br>
        <form action='user.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Wysyłanie pliku:</legend>
                <input name="myfile" type="file">
                <input name="sendfile" type="submit" value="Wyślij">
            </fieldset>
        </form>
        <form action="index.php"  method="post">
            <fieldset>
                <input type="submit" value="Wyloguj" name="wyloguj">
            </fieldset>  
        </form>
        <?php
            if(isset($_POST["sendfile"])) {
                $currentDir = getcwd();
                $uploadDirectory = "/zdjeciaUzytkownikow/";
                $fileName = $_FILES['myfile']['name'];
                $fileSize = $_FILES['myfile']['size'];
                $fileTmpName = $_FILES['myfile']['tmp_name'];
                $fileType = $_FILES['myfile']['type'];
                if ($fileName != "" and
                        ($fileType == 'image/png' or $fileType == 'image/jpeg' 
                        or $fileType =='image/JPEG' or $fileType == 'image/PNG')) 
                {
                    $uploadPath = $currentDir . $uploadDirectory . $fileName;
                    if (move_uploaded_file($fileTmpName, $uploadPath)) {
                        echo "Zdjęcie zostało załadowane na serwer FTP";
                    }
                }
            }

            if (file_exists("zdjeciaUzytkownikow/ip.png")) {
                echo '<img src="zdjeciaUzytkownikow/ip.png">';
            }
            else {
                echo "<p>Zdjęcia na serwerze nie ma.</p>";
            }
        ?> 
    </body>
</html>