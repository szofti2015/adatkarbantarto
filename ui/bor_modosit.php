<?php
    //define("START_DATE", 1950);
    const START_DATE = 1950;

    if(isset($_GET['id']) && !empty($_GET['id'])){

        include "page/header.php";

        require "db_select_by_id.php";
        require "db_select_boraszat.php";
?>

    <main>

        <form action="db_update.php" method="post">
        <fieldset>
        <legend>Adatok módosítása</legend>

        <input type="hidden" name="bor_id" value="<?=$_GET['id']?>"> 
       
        <table>

        <tr>
            <td>
                <label for="bor_nev">Bor neve:</label>
            </td>
            <td>
                <input type="text" name="bor_nev" value="<?=$bor['bor_nev']?>" required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="bor_tipus">Bor tipus:</label>
            </td>
            <td>
                <?php
                    $tipus = strtolower($bor['bor_tipus']);  
                ?>
               
                Fehér<input type="radio" name="bor_tipus" 
                <?=($tipus=='fehér')? 'checked' : ''?>
                value="Fehér" >
                Vörös<input type="radio" name="bor_tipus"
                <?=($tipus=='vörös')? 'checked' : ''?> 
                value="Vörös" >
                Rozé<input type="radio" name="bor_tipus"
                <?=($tipus=='rozé')? 'checked' : ''?> 
                value="Rozé" >
                Aszú<input type="radio" name="bor_tipus"
                <?=($tipus=='aszú')? 'checked' : ''?> 
                value="Aszú" >
            </td>
        </tr>

        <tr>
            <td>
                <label for="bor_palackozva">Palackozás ideje:</label>
            </td>
            <td>
                <select name="bor_palackozva">
                 
                    <?php for ($i = START_DATE; $i <= date("Y"); $i++) : ?>
                        <option <?=($i==$bor['bor_palackozva']) ? 'selected' : '' ?> >
                            <?=$i?>
                        </option>
                    <?php endfor; ?>
                    
                    <option value="0" 
                       <?=($bor['bor_palackozva']==0) ? 'selected' : '' ?>
                       >
                        NA.
                    </option>
                </select>
            </td>
        </tr>

        <tr>
           <td>
               Válasszon borászatot
           </td>
           
           <td style="border: 1px solid black;">
               
               Nincs megadva
               <input type="radio" name="boraszat_id" value="-1" 
               
               <?php if(is_null($bor['boraszat_id'])) : ?>
               checked
               <?php endif; ?> 
               >
               
               <?php foreach($boraszatok as $boraszat) {
                    list($boraszatId, $boraszatNev) = $boraszat; 
               ?>
               
               <?=$boraszatNev?>
               
               <input type="radio" name="boraszat_id" value="<?=$boraszatId?>"
               
               <?=($bor['boraszat_id'] == $boraszatId) ? 'checked' : ''?>
               
               >    
                                    
               <?php } ?>
         
           </td>
           
       </tr>
        
        <tr>
            <td colspan="2">
                <input type="submit" name="submitBtn" value="Módosít">
                <input type="reset" value="Mégsem">
            </td>
        </tr>
        </table>

        </fieldset>

        </form>

    </main>

<?php
        include "page/footer.php";
    }

//     a HAMIS ággal most nem foglalkozok!!!!
?>