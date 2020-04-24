<?php
    session_start();

    $link=mysqli_connect("localhost","scott","tiger","instytut");
    if(!$link){
        printf("Connectfailed:%s\n",mysqli_connect_error());
        exit();
    }
    if (isset($_POST['id_prac'])&&is_numeric($_POST['id_prac'])&&is_string($_POST['nazwisko'])){
        $sql="INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
        $stmt=$link->prepare($sql);
        $stmt->bind_param("is",$_POST['id_prac'],$_POST['nazwisko']);
        $result=$stmt->execute();
        if(!$result){
            $_SESSION["postError"] = mysqli_error($link);
            $stmt->close();
            $link->close();
            header("Location: form06_post.php");
        }
        else {
            $_SESSION["addSuccess"] = "Dodano pracownika!";
            $stmt->close();
            $link->close();
            header("Location: form06_get.php");
        }
    }
    else {
        $_SESSION["postError"] = "Błąd przy przetwarzaniu metody POST";
        header("Location: form06_post.php");
    }
?>