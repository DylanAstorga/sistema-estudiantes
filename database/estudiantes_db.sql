CREATE DATABASE IF NOT EXISTS estudiantes_db;

USE estudiantes_db;

CREATE TABLE estudiantes
(
    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre VARCHAR(100) NOT NULL,

    correo VARCHAR(100) NOT NULL,

    carrera VARCHAR(100) NOT NULL,

    promedio DECIMAL(4,2) NOT NULL,

    es_destacado TINYINT(1) DEFAULT 0,

    beca VARCHAR(100) NULL
);