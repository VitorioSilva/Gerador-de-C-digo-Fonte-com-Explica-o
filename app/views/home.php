<?php
$content = '
    <h1>Bem-vindo, '.$_SESSION['usuario'].'!</h1>
    <p>Você está logado no sistema.</p>
    <a href="?route=code-generator"><button>Gerador de Código</button></a>
    <a href="?route=logout"><button>Sair</button></a>
';

$title = 'Home';
require __DIR__ . '/layouts/main.php';