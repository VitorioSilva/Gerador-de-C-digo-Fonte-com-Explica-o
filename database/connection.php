<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=gerador_codigo", "root", "");
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}