/*  Archivo: creacion.sql
    Autor: Pablo Cidón.
    Creado: 14/01/2018
*/
CREATE DATABASE IF NOT EXISTS DAW211_Tienda;
USE DAW211_Tienda;
CREATE TABLE Usuarios(
  CodUsuario VARCHAR (20) PRIMARY KEY,
  DescUsuario VARCHAR (100),
  Password VARCHAR(100)
)ENGINE=InnoDB;
CREATE TABLE Productos(
  CodProducto VARCHAR (20) PRIMARY KEY,
  Nombre VARCHAR (100),
  NombreCorto VARCHAR (100),
  PVP Float
)ENGINE=InnoDB;