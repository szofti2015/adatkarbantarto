<?php
    include "page/header.php";

    require "../service/BorService.php";
    require "BorHTMLPresenter.php";

    $borService = new service\BorService();
    $data = $borService->findAll();

    $presenter = new ui\BorHTMLPresenter($data);

?>
    <main>
        
        <h1>Borokat karbantartó alkalmazás</h1>  

        <?=$presenter->createTable()?>

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
