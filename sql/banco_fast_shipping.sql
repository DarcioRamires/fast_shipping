-- SQL script to create database schema for Fast Shipping
CREATE DATABASE IF NOT EXISTS fast_shipping;
USE fast_shipping;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nivel_acesso ENUM('admin','cliente','motorista') NOT NULL
);

CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    endereco VARCHAR(200),
    telefone VARCHAR(20),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
);

CREATE TABLE veiculo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(15) UNIQUE NOT NULL,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    capacidade DECIMAL(10,2)
);

CREATE TABLE motorista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    cnh VARCHAR(50),
    id_veiculo INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (id_veiculo) REFERENCES veiculo(id) ON DELETE SET NULL
);

CREATE TABLE carga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    origem VARCHAR(100),
    destino VARCHAR(100),
    peso DECIMAL(10,2),
    dimensoes VARCHAR(100),
    status ENUM('pendente','em_transporte','entregue') DEFAULT 'pendente',
    data_envio DATE,
    data_entrega DATE,
    id_cliente INT,
    id_motorista INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE SET NULL,
    FOREIGN KEY (id_motorista) REFERENCES motorista(id) ON DELETE SET NULL
);

CREATE TABLE pontuacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_avaliador INT,
    tipo_avaliador ENUM('cliente','motorista'),
    pontuacao INT,
    comentario TEXT
);

-- Insert admin user (initial password '123456' must be hashed by running init_admin.php or change manually)
INSERT INTO usuario (nome,email,senha,nivel_acesso) VALUES ('Admin','admin@fastshipping.com','TO_BE_HASHED','admin');
