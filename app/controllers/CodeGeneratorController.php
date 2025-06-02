<?php
class CodeGeneratorController {
    public function index() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?route=login');
            exit;
        }

        $resultado = null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $this->gerarCodigo($_POST['language'], $_POST['prompt']);
        }
        
        require 'app/views/code-generator.php';
    }

    private function gerarCodigo($linguagem, $descricao) {
        $apiKey = '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';
        $fullPrompt = "Gere um código em $linguagem para: $descricao. Depois explique o que cada parte faz.";

        $data = [
            'model' => 'gpt-4o-mini',
            'messages' => [['role' => 'user', 'content' => $fullPrompt]],
            'temperature' => 0.7
        ];

        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data)
        ]);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Erro: ' . curl_error($ch);
        }

        $result = json_decode($response, true);
        return $result['choices'][0]['message']['content'] ?? 'Erro ao obter resposta.';
    }
}