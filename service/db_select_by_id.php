<?php
    require "config.php";

    $borId = $_GET['id'];

    $conn = mysqli_connect($host, $user, $pass, $db);
    
    if(!$conn){
        $hibaOk = "Hiba az adatbáziskapcsolatban!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(1);
    }

    $sql = "SELECT b1.bor_nev, b1.bor_palackozva, b1.bor_tipus, b1.boraszat_id, b2.boraszat_nev, b2.borvidek, b2.alapitas_ev ";
    $sql.= "FROM bor AS b1 LEFT JOIN boraszat AS b2 ";
    $sql.= "ON (b1.boraszat_id = b2.boraszat_id) ";
    $sql.= "WHERE bor_id=".$borId;
    
    //print "$sql<br>";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        $hibaOk = "Hiba a lekérdezés során!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(2);
    }

    $bor = mysqli_fetch_assoc($result);

//    print "<pre>";
//    print_r($bor);
//    print "</pre>";

    mysqli_free_result($result);
    mysqli_close($conn);
?>