<?php
require_once 'ApiAdapter.php';

class OpenAiAdapter implements ApiAdapter {
    public function enviarPrompt(string $linguagem, string $descricao): array {
        return [
            'codigo' => "// Código gerado para $linguagem\n echo 'Olá mundo!';",
            'explicacao' => "Código simulado gerado para a linguagem '$linguagem' com base na descrição."
        ];
    }
}