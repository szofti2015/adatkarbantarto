<?php
    
    $conn = mysqli_connect($host, $user, $pass, $db);
    
    if(!$conn){
        $hibaOk = "Hiba az adatbáziskapcsolatban!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(1);
    }

    // átlagos palackozási idő
    $sql = "SELECT AVG(bor_palackozva) AS atlag FROM bor";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        $hibaOk = "Hiba a lekérdezés során!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(2);
    }

    $record = mysqli_fetch_assoc($result);
    $avg = $record['atlag'];

    mysqli_free_result($result);

    // legidősebb bor adatainak kinyerése
    $sql = "SELECT MIN(bor_palackozva) AS legidosebb FROM bor";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        $hibaOk = "Hiba a lekérdezés során!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(2);
    }
    
    $record = mysqli_fetch_assoc($result);
    $min = $record['legidosebb'];

    mysqli_free_result($result);
    
    $sql = "SELECT bor_nev FROM bor ";
    $sql.= "WHERE bor_palackozva=".$min;

    $result = mysqli_query($conn, $sql);

    if(!$result){
        $hibaOk = "Hiba a lekérdezés során!";
        header("Location: hiba.php?hiba=".$hibaOk);
        exit(2);
    }

    $record = mysqli_fetch_assoc($result);
    $borNev = $record['bor_nev'];

    mysqli_free_result($result);

    mysqli_close($conn);
?>