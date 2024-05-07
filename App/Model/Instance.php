<?php
require_once './Classes/Database/Database.php';


$database = new MySQLDatabase\Database();

try {
    $conn = $database->connect();
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}