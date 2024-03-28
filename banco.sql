CREATE DATABASE IF NOT EXISTS login;

USE login;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    usuario VARCHAR(100) NOT NULL, -- Adicionando a coluna 'usuario'
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nome, email, usuario, senha) VALUES ('Usuário de Exemplo', 'exemplo@example.com', 'exemplo', '$2y$10$QHM/WGczwDQvXADmr.s4xuCFq1CZx63CUeJn/B6Bfd5.EtUyfCwWa');
