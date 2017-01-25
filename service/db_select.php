<?php
    require "config.php";

    $conn = mysqli_connect($host, $user, $pass, $db);
    
    if(!$conn){
        $hibaOk = "Hiba az adatbáziskapcsolatban!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(1);
    }

    $sql = "SELECT b1.bor_id, b1.bor_nev, b1.bor_palackozva, b1.bor_tipus, b2.boraszat_nev ";
    $sql.= "FROM bor AS b1 LEFT JOIN boraszat AS b2 ";
    $sql.= "ON (b1.boraszat_id = b2.boraszat_id) ";
    $sql.= "ORDER BY b1.bor_nev";

    // print $sql;

    $result = mysqli_query($conn, $sql);

    if(!$result){
        $hibaOk = "Hiba a lekérdezés során!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(2);
    }

    $borok = [];

    while($rekord = mysqli_fetch_assoc($result)){
        array_push($borok, $rekord);
    }

    mysqli_free_result($result);
    mysqli_close($conn);
?>