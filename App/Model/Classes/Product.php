<?php

namespace Product;

require_once './Database/Database.php;';

use Database\Database, PDOException, PDO;

class Product extends Database{

    final function select(): array {
        try {
            $this->conn = $this->connect();
    
            if ($this->conn) {
                $stmt = $this->conn->prepare(
                    "SELECT CPF, CONCAT(NOME, ' ', SOBRENOME) 
                    AS `Nome Completo` FROM PESSOA 
                    WHERE FKIDTIPOPESSOA = 1 ORDER BY CPF ASC LIMIT 25"
                );
    
                if ($stmt->execute()) {
                    // Recupera todos os registros como um array associativo
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    return $result;
                } else {
                    return [];
                }
            } else {
                return ["Nada"];
            }
        } catch (PDOException $err) {
            die("Erro: " . $err->getMessage());
        }
    }
    
    final function create($dadosclientesarray) {
        try {
            $this->conn = $this->connect();
    
            if ($this->conn) {
                $this->conn->beginTransaction(); // Inicia uma transação
    
                $stmt = $this->conn->prepare("INSERT INTO PESSOA 
                (FKIDTIPOPESSOA, NOME, SOBRENOME) VALUES (1, ?, ?)");
    
                $result = $stmt->execute([$dadosclientesarray["NMCLIENTE"], 
                $dadosclientesarray["SBCLIENTE"]]);
    
                if ($result) {
                    $this->conn->commit(); // Confirma a transação
                    return "success";
                } else {
                    $this->conn->rollBack(); // Reverte a transação em caso de falha
                    return "fail";
                }
            } else {
                return "paunahoradeconectar";
            }
        } catch (PDOException $err) {
            return "Erro: " . $err->getMessage();
        }
    }
    
    final function update($dadosclientesarray) {
        try {
            $this->conn = $this->connect();
    
            if ($this->conn) {
                $stmt = $this->conn->prepare("UPDATE pessoa SET NOME = ?,
                 SOBRENOME = ? WHERE CPF = ?");
    
                $result = $stmt->execute([$dadosclientesarray["NMCLIENTE"], 
                $dadosclientesarray["SBCLIENTE"],
                 $dadosclientesarray["CPFCLIENTE"]]);
    
                if ($result) {
                    return "success";
                } else {
                    return "fail";
                }
            } else {
                return "paunahoradeconectar";
            }
        } catch (PDOException $err) {
            return "Erro: " . $err->getMessage();
        }
    }
    
    final function delete($dadosclientesarray) {
        try {
            $this->conn = $this->connect();
    
            if ($this->conn) {
                $stmt = $this->conn->prepare("DELETE FROM pessoa WHERE CPF = ?");
    
                $result = $stmt->execute([$dadosclientesarray["CPFCLIENTE"]]);
    
                if ($result) {
                    return "success";
                } else {
                    return "fail";
                }
            } else {
                return "paunahoradeconectar";
            }
        } catch (PDOException $err) {
            return "Erro: " . $err->getMessage();
        }
    }
}    