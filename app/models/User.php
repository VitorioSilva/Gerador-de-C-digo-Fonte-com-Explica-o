<?php
require_once __DIR__ . '/Database.php';

class User {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

public function register($nome, $email, $senha) {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("sss", $nome, $email, $senhaHash);
        return $stmt->execute();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            return false;
        }

        throw $e;
    }
}

    public function login($email, $senha) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($senha, $user['senha'])) {
                return $user;
            }
        }
        return false;
    }
}