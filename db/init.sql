-- db/init.sql (Corregido para usar la columna 'email')

CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE -- CORREGIDO: Usar 'email'
);

INSERT INTO usuarios (nombre, email) VALUES
('Ana Pérez', 'ana@cgt.com'),
('Carlos Gómez', 'carlos@cgt.com'),
('María Torres', 'maria@cgt.com');