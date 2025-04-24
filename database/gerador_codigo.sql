CREATE DATABASE IF NOT EXISTS gerador_codigo;
USE gerador_codigo;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS codigos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    linguagem VARCHAR(50),
    descricao TEXT,
    codigo TEXT,
    explicacao TEXT,
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
);