CREATE DATABASE IF NOT EXISTS  petshop_db DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE petshop_db;

CREATE TABLE IF NOT EXISTS atendimentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_pet VARCHAR(100) NOT NULL,
    idade_pet INT NOT NULL,
    servico VARCHAR(50) NOT NULL,
    data_servico DATE NOT NULL,
    hora_servico TIME NOT NULL,
    foto VARCHAR(250) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;