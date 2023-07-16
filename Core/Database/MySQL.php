<?php 

namespace Core\Database;

use PDO;
use PDOException;

class MySQL 
{
        // using constructor property promotion
        public function __construct(
            private $host = "localhost",
            private $dbname = "jobboard_php",
            private $user = "root",
            private $password = "",
            private $db = null
        )
        {
            //
        }
    
        // connect with db
        public function connect()
        {
            try {
    
                $dsn = "mysql:host={$this->host};dbname={$this->dbname}"; // data source name
    
                $this->db = new PDO($dsn, $this->user, $this->password, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
    
                return $this->db;
        
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
}