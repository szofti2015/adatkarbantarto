<?php
    
    namespace storage;

    require "BaseAdo.php";
    require "../utils/config.php";

    class BorAdo extends BaseAdo {
        
        public function __construct($host = HOST, $user = USER, $pass = PASS, $db = DB){
            parent::__construct($host, $user, $pass, $db);
        }
         
        /**
        * Minden bor kinyerése a db-ből
        * return: eredményhalmaz
        */
        public function findAll(){
            $this->connect();
            
            $result = $this->find("Bor", array('bor_id', 'bor_nev', 'bor_palackozva', 'bor_tipus'));
            
            $back = [];
            while($record = $result->fetch_object()){
                $back[] = $record;
            }
                              
            $this->disconnect();
                 
            return $back;
        }
        
        
    }


?>