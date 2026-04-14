<?php
$host = "localhost";
$db_nome = "sistema_academico"; 
$usuario = "root";
$senha = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_nome", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERRO CRÍTICO: " . $e->getMessage());
}
?>