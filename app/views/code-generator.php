<?php
$content = '
    <h1>Desenvolva seu código</h1>
    <form method="post">
        <label for="language">Escolha a linguagem:</label>
        <select name="language" id="language" required>
            <option value="">-- Selecione --</option>
            <option>Python</option>
            <option>JavaScript</option>
            <option>PHP</option>
            <option>Java</option>
            <option>C</option>
            <option>C++</option>
            <option>Ruby</option>
            <option>Go</option>
        </select>

        <label for="prompt">Descreva o que deseja:</label>
        <textarea name="prompt" id="prompt" placeholder="Ex: Ordenar uma lista de números" required></textarea>

        <button type="submit">Gerar Código</button>
    </form>

    '.($resultado ? '
    <div class="resultado">
        <h2>Resultado:</h2>
        <pre>'.htmlspecialchars($resultado).'</pre>
    </div>' : '').'
';

$title = 'Gerador de Código';
require __DIR__ . '/layouts/main.php';