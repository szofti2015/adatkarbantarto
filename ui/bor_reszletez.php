<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){

        include "page/header.php";
        require "db_select_by_id.php";
        
        ?>
        <main>
           <h2>A <?=$bor['bor_nev']?> adatai: </h2>
            <ul>
               <?php foreach ($bor as $ertek) : ?>
                
                    <?php if(!empty($ertek)) : ?>
                    <li>
                        <?=$ertek?>        
                    </li>        
                    <?php endif;?>
                
                <?php endforeach; ?>
            </ul>
        </main>
    <?php 
        include "page/footer.php";
    }
?>
