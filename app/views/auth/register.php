<?php
$content = '
    <h1>Cadastro</h1>
    ' . (!empty($error) ? '<p style="color:red;">' . htmlspecialchars($error) . '</p>' : '') . '
    <form method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <p>Já tem uma conta? <a href="?route=login">Fazer Login</a></p>
';

$title = 'Cadastro';
require __DIR__ . '/../layouts/main.php';