<?php
    session_start();

    if (isset($_SESSION['postError'])) {
        print ($_SESSION['postError']);
        unset($_SESSION['postError']);
    }
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
</head>
<body>
    <form action ="form06_redirect.php" method="POST">
        id_prac <input type="text" name="id_prac">
        nazwisko <input type="text" name="nazwisko">
        <input type="submit" value="Wstaw">
        <input type="reset" value="Wyczysc">
    </form>
    <a href="form06_get.php">form06_get.php</a>
</html>