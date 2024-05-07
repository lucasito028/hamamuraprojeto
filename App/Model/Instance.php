<?php

// Inclua a definição da classe Database
require_once './Classes/Database/Database.php';

// Crie uma instância da classe Database
$database = new MySQLDatabase\Database();

try {
    // Tente conectar ao banco de dados
    $conn = $database->connect();
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Se ocorrer um erro ao conectar, exiba uma mensagem de erro
    die("Falha na conexão: " . $e->getMessage());
}