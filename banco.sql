-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS login;

-- Seleciona o banco de dados
USE login;

-- Criação da tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Insere um usuário de exemplo para teste
INSERT INTO usuarios (nome, email, senha) VALUES ('Usuário de Exemplo', 'exemplo@example.com', '$2y$10$QHM/WGczwDQvXADmr.s4xuCFq1CZx63CUeJn/B6Bfd5.EtUyfCwWa');
