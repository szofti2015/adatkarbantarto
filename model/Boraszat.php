<?php

    namespace model;

    class Boraszat() {
        
        private $boraszatId;
        private $boraszatNev;
        private $borvidek;
        private $alapitasEv;
        
        public function __construct($boraszatId, $boraszatNev, $borvidek, $alapitasEv){
            $this->boraszatId = $boraszatId;
            $this->boraszatNev = $boraszatNev;
            $this->borvidek = $borvidek;
            $this->alapitasEv = $alapitasEv;
        }
        
        // getter
        
        public function getBoraszatId(){
            return $this->boraszatId;
        }
        
        public function getBoraszatNev(){
            return $this->boraszatNev;
        }
        
        public function getBorvidek(){
            return $this->borvidek;
        }
        
        public function getAlapitasEv(){
            return $this->alapitasEv;
        }
        
        // setter
        
        public function setBoraszatId($boraszatId){
            $this->boraszatId = $boraszatId;
            
            return $this;
        }
        
        public function setBoraszatNev($boraszatNev){
            $this->boraszatNev = $boraszatNev;
            
            return $this;
        }
        
        public function setBorvidek($borvidek){
            $this->borvidek = $borvidek;
            
            return $this;
        }
        
        public function setAlapitasEv($alapitasEv){
            $this->alapitasEv = $alapitasEv;
            
            return $this;
        }
        
        
        
        
    }


?>