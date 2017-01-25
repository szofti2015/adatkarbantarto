<?php

    namespace service;

    require "../model/Bor.php";
    require "../storage/BorAdo.php";

    use \storage\BorAdo as BorAdo;
    use \model\Bor as Bor;

    class BorService{
        
        private $ado;
        
        public function __construct(){
            $this->ado = new BorAdo();
        }
        
        public function findAll(){
            
            $dataSet = $this->ado->findAll();
            
            $data = [];
                   
            foreach($dataSet as $obj){
                $bor = new Bor($obj->bor_id, $obj->bor_nev,
                                $obj->bor_palackozva, $obj->bor_tipus);  
                $data[] = $bor;
            }
            
            return $data;
            
        }
          
    }


?>