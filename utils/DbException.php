<?php

    namespace utils;

    class DbException extends \Exception {
        private $errorMsg;
        
        public function __constuct($msg){
            
            parent::__construct($msg);
                       
            $this->errorMsg = "Hiba a kapcsolatban!";
                                    
        }       
    }

?>