<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Gerador de Código' ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ancizar+Serif:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?= $content ?>
    </div>
    <script src="../../assets/js/script.js"></script>
</body>
</html>