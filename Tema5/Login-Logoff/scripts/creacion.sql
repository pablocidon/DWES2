/*  Archivo: creacion.sql
    Autor: Pablo Cidón.
    Creado: 15/12/2017
*/
CREATE DATABASE IF NOT EXISTS DAW211_Cine;
USE DAW211_Cine;
CREATE TABLE Usuarios(
  CodUsuario VARCHAR (20) PRIMARY KEY,
  DescUsuario VARCHAR (100) PRIMARY KEY,
  Password VARCHAR(100),
  Perfil ENUM('Admin','Usuario') DEFAULT 'Usuario'
)ENGINE=InnoDB;
CREATE TABLE Resultados(
 CodEncuesta int NOT NULL AUTO_INCREMENT PRIMARY KEY,
 Genero VARCHAR (20),
 Categoria VARCHAR (20),
 Frecuencia VARCHAR (20),
 Cartelera VARCHAR (20),
 CodUsuario VARCHAR(20),
 FOREIGN KEY (CodUsuario) REFERENCES Usuarios(CodUsuario)
 ON DELETE CASCADE
 ON UPDATE CASCADE
)ENGINE=InnoDB;