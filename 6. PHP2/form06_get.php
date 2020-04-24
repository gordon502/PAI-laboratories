<?php
    session_start();

    echo '<a href ="form06_post.php">form06_post.php</a><br>';
    if (isset($_SESSION["addSuccess"])) {
        print($_SESSION["addSuccess"]);
        echo "<br>";
        unset($_SESSION["addSuccess"]);
    }

    $link=mysqli_connect("localhost","scott","tiger","instytut");
    if(!$link){
        printf("Connectfailed:%s\n",mysqli_connect_error());
        exit();
    }
    else {
        $sql="SELECT * FROM pracownicy";
        $result=$link->query($sql);
        foreach ($result as $v){
            echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
        }
    }

    $result->free();
    $link->close();
?>