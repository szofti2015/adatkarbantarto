<?php
    require 'config.php';

    if(isset($_POST['submitBtn'])){

        $borNev = trim($_POST['bor_nev']);
        $borTipus = $_POST['bor_tipus'];
        $borPalackozva = intval($_POST['bor_palackozva']);
        $boraszatId = intval($_POST['boraszat_id']);

        $conn = mysqli_connect($host, $user, $pass, $db);

        if(!$conn){
            $hibaOk = "Hiba az adatbáziskapcsolatban!";
            header("Location: hiba.php?hiba=".$hibaOk);
            exit(1);
        }

        $sql = "INSERT INTO bor (bor_nev, bor_tipus, bor_palackozva, boraszat_id) ";
        
        if($borPalackozva > 0){
            $sql.= "VALUES ('$borNev', '$borTipus', $borPalackozva, ";
        } else {
            $sql.= "VALUES ('$borNev', '$borTipus', NULL, ";
        }
        
        if($boraszatId != -1){
            $sql.= $boraszatId.")";
        } else {
            $sql.= "NULL)";
        }

//        print $sql;

        $result = mysqli_query($conn, $sql);

        if(!$result){
            $hibaOk = "Sikertelen beszúrás!";
            header("Location: hiba.php?hiba=".$hibaOk);
            exit(2);
        }

        mysqli_close($conn);

        header("Location: index.php");
    }


?>