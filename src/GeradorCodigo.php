<?php
require_once 'ApiAdapter.php';

class GeradorCodigo {
    private ApiAdapter $adapter;

    public function __construct(ApiAdapter $adapter) {
        $this->adapter = $adapter;
    }

    public function gerar(string $linguagem, string $descricao): array {
        return $this->adapter->enviarPrompt($linguagem, $descricao);
    }
}