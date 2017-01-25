<?php

    require "config.php";

    if(isset($_GET['id']) && !empty($_GET['id'])){

        $id = $_GET['id'];
            
        $conn = mysqli_connect($host, $user, $pass, $db);
        
        if(!$conn){
            $hibaOk = "Hiba az adatbáziskapcsolatban!";
            header("Location: hiba.php?hiba=".$hibaOk);
            exit(1);
        }
     
        $sql = "DELETE FROM bor WHERE bor_id=".$id;
        
        $success = mysqli_query($conn, $sql);
        
        if(!$success){
            $hibaOk = "Sikertelen törlés!";
            header("Location: hiba.php?hiba=".$hibaOk);
            exit(3);
        }

        mysqli_close($conn);
        
        header("Location: index.php");
    }