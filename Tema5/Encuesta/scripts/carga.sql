/*  Archivo: creacion.sql
    Autor: Pablo Cidón.
    Creado: 18/12/2017
*/
USE DAW211_Cine;
INSERT INTO Usuarios VALUES
  ('administrador','usuario administrador',sha2('paso',256),'Administrador'),
  ('pablo','',sha2('paso',256),'Usuario'),
  ('juancarlos','',sha2('paso',256),'Usuario'),
  ('juanjo','',sha2('paso',256),'Usuario'),
  ('heraclio','',sha2('paso',256),'Usuario'),
  ('luci','',sha2('paso',256),'Usuario'),
  ('cristina','',sha2('paso',256),'Usuario'),
  ('alejandro','',sha2('paso',256),'Usuario'),
  ('rodrigo','',sha2('paso',256),'Usuario'),
  ('sergio','',sha2('paso',256),'Usuario'),
  ('mario','',sha2('paso',256),'Usuario');