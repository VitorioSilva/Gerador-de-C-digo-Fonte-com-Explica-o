<?php
interface ApiAdapter {
    public function enviarPrompt(string $linguagem, string $descricao): array;
}