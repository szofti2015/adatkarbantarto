<?php
    namespace model;

    class Bor {
        
        private $borId;
        private $borNev;
        private $borPalackozva;
        private $borTipus;
        
        private $imageDir = IMAGE_DIR;

        // idegen kulcs későbbiekben
        
        public function __construct($borId, $borNev, $borPalackozva, $borTipus) {
            $this->borId = $borId;
            $this->borNev = $borNev;
            $this->borPalackozva = $borTipus;
            $this->borTipus = $borTipus;
        }
        
        // getter
        public function getBorId(){
            return $this->borId;
        }
        
        public function getBorNev(){
            return $this->borNev;
        }
        
        public function getBorPalackozva(){
            return $this->borPalackozva;
            
        }
        
        public function getBorTipus(){
            return $this->borTipus;
        }
        
        // setter -> láncolással
        public function setBorId($borId){
            $this->borId = $borId;
            
            return $this;
        }
        
        public function setBorNev($borNev){
            $this->borNev = $borNev;
            
            return $this;
        }
        
        public function setBorTipus($borTipus){
            $this->borTipus = $borTipus;
            
            return $this;
        }
        
        public function setBorPalackozva($borPalackozva){
            $this->borPalackozva = $borPalackozva;
            

            return $this;
        }
        
        public function getLink(){
            $html = <<<HTML

<a href="bor_reszletez.php?id={$this->borId}" >
    <img src="{$this->imageDir}details.jpg" width="15">
</a>

<a href="bor_modosit.php?id={$this->borId}" >
    <img src="{$this->imageDir}edit.jpg" width="15">
</a>

<a href="db_delete.php?id={$this->borId}">
    <img src="{$this->imageDir}delete.jpg" width="15">
</a>

HTML;

            return $html;

        }

    }

?>
