CREATE DATABASE IF NOT EXISTS DAW211_Usuarios;
USE DAW211_Usuarios;
CREATE TABLE Usuarios(
  CodUsuario VARCHAR (20) PRIMARY KEY,
  Password VARCHAR(100),
  Perfil ENUM('Admin','Usuario')
)ENGINE=InnoDB;