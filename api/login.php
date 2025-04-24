<?php
require_once '../database/connection.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
$stmt->execute([$data['email'], $data['senha']]);
$user = $stmt->fetch();

echo json_encode(['msg' => $user ? "Login bem-sucedido!" : "Credenciais inválidas."]);