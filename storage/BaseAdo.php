<?php
    
    namespace storage;

    require "../utils/DbException.php";
    require "../utils/Utils.php";

    use \utils\Utils as Utils;
    use \utils\DbException as DbException;

    // Access Data Object ADO, Data Access Object DAO
    class BaseAdo {
        
        private $conn;
        
        private $host, $user, $pass, $db;
        
        public function __construct($host, $user, $pass, $db){
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->db = $db;
        }
        
        protected function connect(){

            $this->conn = @new \mysqli($this->host, $this->user, $this->pass, $this->db);        
            
            if($this->conn->connect_errno){
                throw new DbException($this->conn->error);
            }
            
        }
        
        protected function disconnect(){
            
            if($this->conn){
                $this->conn->close();
            }
            
        }
        
        /**
        *   Egy lekérdezést futtat a db-n
        *   $tableName: A tábla, ahonnan lekérdezek
        *   $columns: az oszlopok nevei, ha nincs megadva, akkor null
        */
        protected function find($tableName, $columns = null){

            $sql = "SELECT ";
            
            if (is_array($columns)){
                foreach($columns as $column){
                    $sql .= $column .", ";
                }
                
                $sql = Utils::removeLastComma($sql);
                        
            } else {
                $sql .= " * ";   
            }
            
            $sql .= " FROM ".$tableName;
            
            $result = $this->conn->query($sql);
            
            return $result;
        }
        
        
    }


?>