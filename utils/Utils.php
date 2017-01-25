<?php

    namespace utils;

    /**
    * Hasznos rutinok hívhatüak innen
    */
    class Utils {
        
        /**
        *   Eltávolítja az utolsó vesszőt a szringből
        *   params: a szöveg, amiből eltávolitom
        *   return: az eltávolítás utáni szöveg
        */
        public static function removeLastComma($str){
            return substr($str, 0, strrpos($str, ','));
        }   
    }

?>