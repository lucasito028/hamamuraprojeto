<?php

namespace MySQLDatabase;

require_once 'Keys.php';

use Keys\Keys, PDO, PDOException;


abstract class Database extends Keys{


    function connect(): PDO{
        
        try{
            $dns = "mysql:host={$this->host};
            port={$this->port};
            dbname={$this->db}";

            $this->conn = new PDO($dns, $this->user, $this->password);

            return $this->conn;

        }catch(PDOException $e){

            die("Morri". $e->getMessage());

        }
    }
    
}