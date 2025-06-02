<?php
$content = '
    <h1>Login</h1>
    '.($error ?? '').'
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="?route=register">Criar Conta</a></p>
';

$title = 'Login';
require __DIR__ . '/../layouts/main.php';