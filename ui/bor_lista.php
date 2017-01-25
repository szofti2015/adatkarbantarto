<?php
    include "page/header.php";

    require "../service/BorService.php";

    $borService = new service\BorService();

    $data = $borService->findAll();

?>
    <main>
        
        <h1>Borokat karbantartó alkalmazás</h1>  
        
        
    <table border='1' cellspacing='0'>
        <tr>
            <th>Bor neve</th>
            <th>Típus</th>
            <th>Palackozva</th>
<!--            <th>Borászat</th>-->
            <th>Műveletek</th>
            
        </tr>
       
        <?php foreach($data as $bor) { ?>
        <tr>
            <td><?=$bor->getBorNev()?></td>
            <td><?=$bor->getBorTipus()?></td>
            
            <td>
                <?=($bor->getBorPalackozva()) ? $bor->getBorPalackozva() : "Nincs érték" ?>
            </td> 
         
            
               
            
            
            <td style="text-align: center">
               
                <a href="bor_reszletez.php?id=<?=$bor->getBorId()?>" > 
                    <img src="../asserts/image/details.jpg" width="15">
                </a>
               
                <a href="bor_modosit.php?id=<?=$bor->getBorId()?>" > 
                    <img src="../asserts/image/edit.jpg" width="15">
                </a>
                
                <a href="db_delete.php?id=<?=$bor->getBorId()?>">
                    <img src="../asserts/image/delete.jpg" width="15">
                </a>
                
            </td>
        </tr>
        <?php } ?>
    </table>
   
   <div>
       <h3>Adatok összesítése</h3>
       
       <ul>
           <li>Átlagos palackozási év: <?=$avg?></li>
           <li>Legkorábbi bor palackozása: <?=$min?> és ez a bor: <?=$borNev?></li>
       </ul>
   </div>
   
   
   <div>        
        <a href="bor_felvetel.php">
            Új bor felvétele
        </a>

   </div>

    </main>  

<?php      
    include "page/footer.php";
?>