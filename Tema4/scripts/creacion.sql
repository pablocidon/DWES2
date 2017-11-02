CREATE DATABASE DAW211_DBdepartamentos;
USE DAW211_DBdepartamentos;
CREATE TABLE Departamento(
	CodDepartamento VARCHAR(3) PRIMARY KEY,
	DescDepartamento VARCHAR(255),
	FechaBaja DATE
)ENGINE=InnoDB;



