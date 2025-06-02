<?php
session_start();

require_once __DIR__.'/app/models/Database.php';
require_once __DIR__.'/app/models/User.php';

$route = $_GET['route'] ?? 'login';

switch ($route) {
    case 'login':
        require __DIR__.'/app/controllers/AuthController.php';
        (new AuthController())->login();
        break;
    case 'register':
        require __DIR__.'/app/controllers/AuthController.php';
        (new AuthController())->register();
        break;
    case 'home':
        require __DIR__.'/app/controllers/HomeController.php';
        (new HomeController())->index();
        break;
    case 'code-generator':
        require __DIR__.'/app/controllers/CodeGeneratorController.php';
        (new CodeGeneratorController())->index();
        break;
    case 'logout':
        require __DIR__.'/app/controllers/AuthController.php';
        (new AuthController())->logout();
        break;
    default:
        http_response_code(404);
        echo '404 - Página não encontrada';
        break;
}