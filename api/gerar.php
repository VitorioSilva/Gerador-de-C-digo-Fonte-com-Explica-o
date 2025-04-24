<?php
require_once '../src/GeradorCodigo.php';
require_once '../src/OpenAiAdapter.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);
$gerador = new GeradorCodigo(new OpenAiAdapter());
echo json_encode($gerador->gerar($data['linguagem'], $data['descricao']));