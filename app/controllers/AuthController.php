<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        $error = null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $loggedUser = $user->login($_POST['email'], $_POST['senha']);
            
            if ($loggedUser) {
                $_SESSION['usuario'] = $loggedUser['nome'];
                header('Location: ?route=home');
                exit;
            } else {
                $error = "Usuário ou senha incorretos!";
            }
        }
        
        require __DIR__.'/../views/auth/login.php';
    }

    public function register() {
        $error = null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            if ($user->register($_POST['nome'], $_POST['email'], $_POST['senha'])) {
                header('Location: ?route=login');
                exit;
            } else {
                $error = "Erro no cadastro! e-mail já está cadastrado.";
            }
        }
        
        require __DIR__.'/../views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: ?route=login');
        exit;
    }
}