<?php
require_once '../database/connection.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['email']) || !isset($data['senha'])) {
    echo json_encode(['msg' => 'Dados inválidos']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
    $stmt->execute([$data['email'], $data['senha']]);
    echo json_encode(['msg' => "Usuário cadastrado com sucesso!"]);
} catch (PDOException $e) {
    echo json_encode(['msg' => "Erro ao cadastrar: " . $e->getMessage()]);
}