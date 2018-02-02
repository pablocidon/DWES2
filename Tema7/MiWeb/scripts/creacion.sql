CREATE DATABASE IF NOT EXISTS DAW211_MiWeb;
USE DAW211_MiWeb;
CREATE TABLE Usuarios(
  CodUsuario VARCHAR (20) PRIMARY KEY,
  DescUsuario VARCHAR (100),
  Password VARCHAR(100),
  Perfil ENUM('Administrador','Usuario') DEFAULT 'Usuario',
  UltimaContexion 
  ContadorAccesos int
)ENGINE=InnoDB;
