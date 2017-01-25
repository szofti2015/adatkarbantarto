<?php
    include "page/header.php";
    require "db_select_boraszat.php";
    //define("START_DATE", 1950);

    const START_DATE = 1950;
?>

    <main>

        <form action="db_insert.php" method="post">
        <fieldset>
        <legend>Új bor adatai</legend>

        <table>

        <tr>
            <td>
                <label for="bor_nev">Bor neve:</label>
            </td>
            <td>
                <input type="text" name="bor_nev" required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="bor_tipus">Bor tipus:</label>
            </td>
            <td>
                Fehér<input type="radio" name="bor_tipus" value="Fehér" checked>
                Vörös<input type="radio" name="bor_tipus" value="Vörös">
                Rozé<input type="radio" name="bor_tipus" value="Rozé">
                Aszú<input type="radio" name="bor_tipus" value="Aszú">
            </td>
        </tr>

        <tr>
            <td>
                <label for="bor_palackozva">Palackozás ideje:</label>
            </td>
            <td>
                <select name="bor_palackozva"> 
                    <?php for ($i = START_DATE; $i <= date("Y"); $i++) : ?>
                        <option <?=($i==date('Y')) ? 'selected' : '' ?> >
                            <?=$i?>
                        </option>
                    <?php endfor; ?>
                    <option value="0">NA.</option>
                </select>
            </td>
        </tr>

       <tr>
           <td>
               Válasszon borászatot
           </td>
           
           <td style="border: 1px solid black;">
               Nincs megadva<input type="radio" name="boraszat_id" value="-1" checked>
               
               <?php foreach($boraszatok as $boraszat) {
                    // $borId = $boraszat[0];
                    // $borNev = $boraszat[1];
                    list($boraszatId, $boraszatNev) = $boraszat; 
               ?>
               
               <?=$boraszatNev?><input type="radio" name="boraszat_id" value="<?=$boraszatId?>">                         
               <?php } ?>
         
           </td>
           
       </tr>
       
        <tr>
            <td colspan="2">
                <input type="submit" name="submitBtn" value="Felvesz">
                <input type="reset" value="Mégsem">
            </td>
        </tr>
        </table>

        </fieldset>

        </form>

    </main>

<?php
    include "page/footer.php";
?>