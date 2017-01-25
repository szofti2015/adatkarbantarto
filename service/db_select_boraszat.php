<?php
    require "config.php";

    $conn = mysqli_connect($host, $user, $pass, $db);
    
    if(!$conn){
        $hibaOk = "Hiba az adatbáziskapcsolatban!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(1);
    }

    $sql = "SELECT boraszat_id, boraszat_nev FROM boraszat";

    // print $sql;

    $result = mysqli_query($conn, $sql);

    if(!$result){
        $hibaOk = "Hiba a lekérdezés során!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(2);
    }

    $boraszatok = [];
    // most nem társításos tömbként nyerem ki, hanem számmal indexelként
    while($rekord = mysqli_fetch_row($result)){
        array_push($boraszatok, $rekord);
    }

    mysqli_free_result($result);
    mysqli_close($conn);
?>