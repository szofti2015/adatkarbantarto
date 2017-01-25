<?php
    require 'config.php';

    if(isset($_POST['submitBtn'])){

        $borId = $_POST['bor_id'];
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

        $sql = "UPDATE bor SET ";
        $sql.= "bor_nev = '".$borNev."', ";
        $sql.= "bor_tipus = '".$borTipus."', ";
        $sql.= "bor_palackozva = ".
                (($borPalackozva > 0) ? $borPalackozva : 'NULL').", ";
        
        $sql.= "boraszat_id = ".
                (($boraszatId != -1) ? $boraszatId : 'NULL')." ";
        $sql.= "WHERE bor_id=".$borId;
        
        //print $sql;

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