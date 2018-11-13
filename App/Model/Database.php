<?php


    namespace App\Model;
    use \App\Config;

    class Database{

        private $conn;

        public function __construct(){
            $this->conn = new \PDO(
                "mysql:dbname=" . Config::DATABASE_NAME . ";host=" . Config::HOST_NAME,
                Config::DATABASE_USER_NAME,
                Config::DATABASE_PASSWORD
            );
            $this->query("SET NAMES 'utf8'");
        }

        private function setParams($statement, $parameters = array()){
    
            foreach ($parameters as $key => $value) {
                
                $this->bindParam($statement, $key, $value);
    
            }
    
        }
    
        private function bindParam($statement, $key, $value){
    
            $statement->bindParam($key, $value);
    
        }
    
        public function query($rawQuery, $params = array()){
    
            $stmt = $this->conn->prepare($rawQuery);
    
            $this->setParams($stmt, $params);
    
            return $stmt->execute();
            
    
        }
    
        public function select($rawQuery, $params = array()):array{
    
            $stmt = $this->conn->prepare($rawQuery);
    
            $this->setParams($stmt, $params);
    
            $stmt->execute();
    
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        }
    
    }

    