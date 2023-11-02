-- Verificar si la base de datos 'agenda' existe
CREATE DATABASE IF NOT EXISTS agenda;

-- Seleccionar la base de datos 'agenda'
USE agenda;

-- Crear la tabla de usuarios si no existe
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
);

-- Crear la tabla de contactos si no existe
CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Crear la tabla de eventos si no existe
CREATE TABLE IF NOT EXISTS eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    usuario_id INT,
    contacto_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (contacto_id) REFERENCES contactos(id) ON DELETE SET NULL
);

-- Crear la tabla de user_tokens si no existe
CREATE TABLE IF NOT EXISTS user_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    idInstance VARCHAR(255),
    apiTokenInstance VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);


