<?php
class HomeController {
    public function index() {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?route=login');
            exit;
        }
        
        require 'app/views/home.php';
    }
}