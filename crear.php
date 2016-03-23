<!DOCTYPE html>
<html>

<head>
  <title>Fútbol-7 Sevilla</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="jquery-ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="./usuario/css/jugador.css">
</head>
<style media="screen">
  .install{
    text-align: center;
  }

</style>
<body>
<?php

  if (isset($_POST['nombre'])) {
    include './admin/conexion.php';

    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $usuario=$_POST['usuario'];
    $pass=$_POST['password'];
    $correo=$_POST['email'];
    $equipo=$_POST['equipo'];
    $defecto=$_POST['defecto'];
    $jugador=$_POST['jugador'];

    $connection->query("INSERT INTO ENTRENADOR VALUES
          (NULL,'$nombre','$apellidos','$correo','$usuario',md5('$pass'),'tema1','admin');");
    if ($defecto==='si') {
      $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
        (1, 'Ronquillo C.F.', 'El Ronquillo'),
        (2, 'Castillo C.F.', 'El Castillo de las Guardas'),
        (3, 'Torre Reina C.D.', 'Torre de la Reina'),
        (4, 'C.D. Burguillos', 'Burguillos'),
        (5, 'Guillena C.F.', 'Guillena'),
        (6, 'Brenes Balompié', 'Brenes'),
        (7, 'Atco. Algabeño', 'La Algaba'),
        (8, 'Alcalá del Río C.F.', 'Alcalá del Río'),
        (9, 'Cazallla Sierra', 'Cazalla de la Sierra'),
        (10, 'Cantillana C.D.', 'Cantillana'),
        (11, 'C.D. Aznalcollar', 'Aznalcollar'),
        (12, 'Constantina C.D.', 'Constantina'),
        (13, 'U.D. Santiponce', 'Santiponce'),
        (14, 'Camas C.F.', 'Camas');");

        if ($jugador==='si') {
          $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (1, 'Óscar', 'Trillo Martín', 'Osquitar', 'portero', '1.80', 80, 1, 30, 1),
            (2, 'Carlos', 'Marín Ros', 'Negro', 'Defensa', '1.72', 75, 2, 25, 1),
            (3, 'Jairo ', 'Macero Bernardino', 'Jairo', 'Defensa', '1.77', 78, 3, 27, 1),
            (5, 'José Manuel', 'Sánchez Gordo', 'Jose', 'delantero', '1.74', 78, 5, 34, 1),
            (6, 'Benito', 'Martín Martín', 'Beni', 'Medio', '1.81', 79, 6, 36, 1),
            (7, 'Juan Antonio', 'Domínguez Vargas', 'Porreto', 'Medio', '1.78', 76, 8, 28, 1),
            (8, 'Julián', 'Rodríguez Melchor', 'Juli', 'Medio', '1.74', 65, 7, 26, 1),
            (9, 'Pedro', 'Hernández García', 'Pedro', 'Defensa', '1.75', 73, 12, 18, 1),
            (11, 'Luis Miguel ', 'Romero García', 'Luismi', 'Delantero', '1.78', 68, 9, 26, 1),
            (13, 'Jose María', 'Marín Rubio', 'Josemari', 'Portero', '1.81', 93, 13, 28, 1),
            (15, 'Pedro José', 'Silva Pérez', 'Piter', 'Portero', '1.81', 80, 1, 32, 2),
            (20, 'Antonio', 'Noguera Suarez', 'Toni', 'Defensa', '1.78', 76, 2, 19, 2),
            (21, 'Miguel Ángel ', 'Silva Ruiz', 'Migue', 'Defensa', '1.83', 80, 3, 26, 2),
            (22, 'José Luis', 'Martín Villar', 'Selu', 'Defensa', '1.86', 81, 4, 29, 2),
            (23, 'José Manuel', 'Sánchez Ros', 'Sánchez', 'Defensa', '1.76', 76, 5, 21, 2),
            (24, 'Juan Antonio', 'Ramos Ojeda', 'Juanan', 'Medio', '1.81', 79, 6, 31, 2),
            (25, 'Rafael', 'Mena González', 'Rafa', 'Medio', '1.76', 72, 7, 26, 2),
            (26, 'Rafael', 'Ruiz Alonso', 'Alonso', 'Medio', '1.69', 65, 8, 21, 2),
            (27, 'Santiago', 'Gines Ramos', 'Santi', 'Medio', '1.70', 66, 9, 29, 2),
            (29, 'Manuel', 'Campos Martínez', 'Manolo', 'Delantero', '1.76', 80, 11, 26, 2),
            (31, 'Juan Felipe', 'Romero Gómez', 'Lipe', 'Medio', '1.79', 73, 2, 26, 3),
            (32, 'Francisco Manuel', 'Gómez Murillo', 'Manu', 'Defensa', '1.86', 79, 3, 31, 3),
            (34, 'José Juan', 'Vázquez Sánchez', 'Puche', 'Defensa', '1.83', 80, 5, 29, 3),
            (35, 'Luis', 'Cartel Pérez', 'Luis', 'Defensa', '1.69', 72, 6, 30, 3),
            (39, 'José Carlos', 'Acosta Lepe', 'Jose', 'Medio', '1.90', 83, 10, 32, 3),
            (40, 'Juan', 'Miranda Enamorado', 'Miranda', 'Delantero', '1.87', 90, 11, 29, 3),
            (41, 'José', 'Ramos Vela', 'Ramos', 'Delantero', '1.76', 75, 12, 35, 3),
            (42, 'Sergio', 'Guzmán Roldán', 'Sergi', 'Portero', '1.81', 80, 13, 24, 3),
            (43, 'Adrián', 'Valderas Rodríguez', 'Adri', 'Portero', '1.78', 76, 1, 19, 4),
            (44, 'Alejandro', 'López Rojas', 'Alex', 'Defensa', '1.84', 81, 2, 26, 4),
            (45, 'Carlos', 'Franco Murillo', 'Carlitos', 'Defensa', '1.79', 73, 3, 17, 4),
            (46, 'Daniel', 'García Fuentes', 'Dani', 'Defensa', '1.78', 76, 4, 29, 4),
            (47, 'Emilio', 'López Cid', 'Emilio', 'Defensa', '1.81', 75, 5, 30, 4),
            (48, 'Jesús', 'López Gelo', 'Jesuli', 'Medio', '1.76', 70, 6, 27, 4),
            (49, 'Ismael', 'Vázquez Herrera', 'Isma', 'Medio', '1.81', 79, 7, 19, 4),
            (50, 'Tomás', 'Bejarano Gutiérrez', 'Guti', 'Medio', '1.78', 81, 8, 26, 4),
            (51, 'Santiago', 'López Gil', 'Santi', 'Medio', '1.81', 79, 9, 19, 4),
            (52, 'Óscar', 'Herencia López', 'Óscar', 'Delantero', '1.76', 72, 10, 25, 4),
            (54, 'Álvaro', 'Díaz Jurado', 'Álvaro', 'Portero', '1.79', 80, 1, 29, 5),
            (55, 'Álvaro', 'López Ruiz', 'López', 'Defensa', '1.82', 79, 2, 28, 5),
            (57, 'Iván', 'García Fernández', 'Iván', 'Defensa', '1.78', 72, 4, 19, 5),
            (58, 'Jesús', 'Pernía Fernández', 'Jesús', 'Defensa', '1.75', 78, 5, 19, 5),
            (59, 'José Luis', 'Ruiz Farfán', 'Selu', 'Defensa', '1.85', 74, 6, 25, 5),
            (60, 'Moisés', 'Mallén Pendón', 'Moy', 'Medio', '1.76', 78, 7, 20, 5),
            (61, 'Pablo', 'Martín Caballero', 'Pablito', 'Medio', '1.78', 70, 8, 17, 5),
            (62, 'Serafín', 'Núñez Chozas', 'Serafín', 'Medio', '1.71', 69, 9, 21, 5),
            (63, 'Rodrigo', 'González Acosta', 'Rodri', 'Medio', '1.74', 74, 10, 22, 5),
            (64, 'Ramón', 'Alonso Pérez', 'Alonso', 'Delentero', '1.78', 80, 11, 23, 5),
            (65, 'Juan Manuel', 'Díaz Cárdenas', 'Juanma', 'Delantero', '1.78', 78, 12, 21, 5),
            (66, 'Alberto', 'Pérez Jiménez', 'Jiménez', 'Portero', '1.90', 88, 1, 24, 6),
            (67, 'Isaac', 'Barrul Gómez', 'Barrul', 'Medio', '2.00', 81, 2, 25, 6),
            (68, 'Miguel Ángel', 'Ramírez Sánchez', 'Migue', 'Defensa', '1.82', 74, 3, 29, 6),
            (71, 'David', 'Lara Cruz', 'David', 'Medio', '1.71', 74, 6, 31, 6),
            (72, 'Alfonso', 'Ort Baena', 'Alfonso', 'Medio', '1.80', 75, 7, 25, 6),
            (74, 'Alberto', 'Pérez Montes', 'Alberto', 'Delantero', '1.97', 83, 9, 22, 6),
            (76, 'Juan', 'Bernal Jiménez', 'Chino', 'Delantero', '1.98', 89, 11, 26, 6),
            (78, 'Diego', 'Manas Sánchez', 'Diego', 'Portero', '1.92', 83, 1, 31, 7),
            (79, 'Álvaro', 'Morilla Dávalos', 'Álvaro', 'Defensa', '1.76', 79, 2, 26, 7),
            (80, 'Lorenzo', 'Sánchez Aragón', 'Loren', 'Defensa', '1.79', 79, 3, 29, 7),
            (82, 'Julio', 'Delgado Huertas', 'Juli', 'Defensa', '1.82', 80, 5, 26, 7),
            (83, 'Carlos', 'Díaz Serrano', 'Carlos', 'Medio', '1.72', 72, 6, 19, 7),
            (84, 'Jairo', 'Rodríguez Jiménez', 'Jairo', 'Medio', '1.80', 76, 7, 26, 7),
            (85, 'Iván', 'Gaviño López', 'Iván', 'Medio', '1.76', 76, 8, 23, 7),
            (86, 'Ezequiel', 'García García', 'Ezequiel', 'Medio', '1.80', 79, 9, 29, 7),
            (87, 'Álvaro', 'Madroñal Ruiz', 'Álvaro', 'Delantero', '1.75', 76, 10, 23, 7),
            (88, 'Luis', 'Vargas Lara', 'Vargas', 'Delantero', '2.00', 89, 11, 30, 7),
            (90, 'Aarón', 'Aguilar Pérez', 'Aarón', 'Portero', '1.87', 87, 1, 23, 8),
            (91, 'Jorge', 'Jiménez Díaz', 'Jorge', 'Defensa', '1.81', 75, 2, 22, 8),
            (92, 'Sergio', 'Osuna Bravo', 'Sergio', 'Defensa', '1.75', 74, 3, 22, 8),
            (93, 'José Carlos', 'Lorca López', 'Jose', 'Defensa', '1.72', 72, 4, 26, 8),
            (94, 'Samuel', 'García Álvarez', 'Samu', 'Defensa', '1.79', 74, 5, 29, 8),
            (95, 'Alberto', 'Ledesma Milán', 'Ledes', 'Medio', '1.80', 79, 6, 31, 8),
            (96, 'José', 'Pino Morata', 'Pino', 'Medio', '1.75', 71, 7, 23, 8),
            (97, 'Manuel', 'Randón Palop', 'Palop', 'Medio', '1.80', 78, 8, 29, 8),
            (98, 'Rafael', 'Torres Gemelo', 'Torres', 'Medio', '1.75', 71, 9, 30, 8),
            (99, 'Francisco', 'Campos Leal', 'Fran', 'Delantero', '1.84', 78, 10, 34, 8),
            (100, 'Joaquín', 'Blanco Calero', 'Juaqui', 'Delantero', '1.79', 74, 11, 29, 8),
            (101, 'José Miguel', 'Fernández Gordo', 'Josemi', 'Delantero', '1.76', 74, 12, 26, 8),
            (102, 'Daniel', 'Medián Gallardo', 'Gallardo', 'Portero', '1.80', 79, 1, 23, 9),
            (103, 'Pablo', 'Cabrera Montenegro', 'Pablo', 'Defensa', '1.79', 75, 2, 26, 9),
            (104, 'Borja', 'Suárez García', 'Borja', 'Defensa', '1.81', 79, 3, 29, 9),
            (105, 'Guillermo', 'Barcena López', 'Guille', 'Defensa', '1.78', 79, 4, 36, 9),
            (106, 'Manuel', 'Garoña García', 'Manu', 'Defensa', '1.75', 78, 5, 25, 9),
            (107, 'Sergio', 'Pelayo Fernández', 'Sergio', 'Defensa', '1.80', 78, 6, 30, 9),
            (108, 'Manuel', 'Marín Segurola', 'Marín', 'Medio', '1.78', 75, 7, 23, 9),
            (109, 'Miguel Ángel', 'Segurola Ramos', 'Migue', 'Medio', '1.75', 78, 8, 29, 9),
            (111, 'Javier', 'Rosado Cortés', 'Javi', 'Delantero', '1.75', 79, 10, 21, 9),
            (112, 'Ramón', 'Benítez Álvarez', 'Ramoni', 'Delantero', '1.74', 74, 11, 20, 9),
            (113, 'David', 'Bravo Ramírez', 'David', 'Delantero', '1.90', 82, 12, 32, 9),
            (114, 'Lázaro', 'Damas Cruz', 'Lázaro', 'Portero', '1.81', 78, 1, 20, 10),
            (115, 'Mariano', 'García Linero', 'Mariano', 'Defensa', '1.71', 68, 2, 23, 10),
            (116, 'José María', 'Soria Morón', 'Josemari', 'Defensa', '1.75', 70, 3, 21, 10),
            (117, 'Francisco', 'Ruiz García', 'Paco', 'Defensa', '1.78', 74, 4, 26, 10),
            (118, 'Juan', 'Sánchez Franco', 'Juan', 'Defensa', '1.81', 74, 5, 31, 10),
            (119, 'Antonio Ramón', 'Holgado Huertas', 'Ramón', 'Medio', '1.79', 76, 6, 34, 10),
            (121, 'Cristobal', 'García Pelayo', 'Cristobal', 'Medio', '1.69', 65, 8, 19, 10),
            (123, 'Agustín', 'García Remón', 'Agustín', 'Delantero', '1.87', 82, 10, 29, 10),
            (124, 'Álvaro', 'Cortés Sanvicente', 'Álvaro', 'Delantero', '1.74', 71, 11, 25, 10),
            (125, 'Iván', 'Sánchez Prieto', 'Iván', 'Portero', '1.81', 78, 12, 26, 10),
            (126, 'Javier', 'García Molina', 'Javi', 'Portero', '1.71', 68, 1, 29, 11),
            (127, 'Jesús', 'Manzano Daza', 'Jesuli', 'Defensa', '1.75', 68, 2, 34, 11),
            (128, 'Pablo', 'Franco Marín', 'Franco', 'Defensa', '1.75', 70, 3, 21, 11),
            (129, 'Rubén', 'Cortés Solís', 'Rubén', 'Defensa', '1.79', 74, 4, 26, 11),
            (130, 'Eloy', 'Jiménez Duque', 'Eloy', 'Defensa', '1.84', 80, 5, 30, 11),
            (131, 'Eugenio', 'Sainz Loza', 'Eugenio', 'Medio', '1.71', 65, 6, 21, 11),
            (132, 'Jorge', 'Nieto Macero', 'Jorge', 'Medio', '1.75', 74, 7, 29, 11),
            (133, 'Miguel', 'Chillón Pino', 'Miguel', 'Medio', '1.79', 74, 8, 31, 11),
            (134, 'Sergio', 'García Carillo', 'Sergio', 'Medio', '1.74', 74, 9, 24, 11),
            (135, 'Manuel', 'Soto Ossorio', 'Manu', 'Delantero', '1.74', 70, 10, 34, 11),
            (136, 'José Luis', 'Moris Vega', 'Vega', 'Delantero', '1.81', 79, 11, 30, 11),
            (137, 'Juan', 'Montero Garcés', 'Juan', 'Delantero', '1.78', 75, 12, 20, 11),
            (139, 'David', 'Ortiz Orillán', 'David', 'Portero', '1.78', 76, 1, 24, 12),
            (140, 'Francisco', 'Casáñez Martínez', 'Fran', 'Defensa', '1.81', 76, 2, 29, 12),
            (141, 'Adrián', 'Zambrano Gómez', 'Zambrano', 'Defensa', '1.78', 71, 3, 19, 12),
            (142, 'Sergio', 'Limia Durán', 'Sergio', 'Defensa', '1.74', 68, 4, 21, 12),
            (143, 'Guillermo', 'Senso Pizarro', 'Guille', 'Defensa', '1.79', 75, 5, 29, 12),
            (145, 'Fernando', 'Guisado Llaga', 'Fernand', 'Medio', '1.75', 71, 7, 30, 12),
            (146, 'Nicolás', 'Tovar Adorna', 'Tovar', 'Medio', '1.73', 71, 8, 19, 12),
            (147, 'Manuel', 'Merino Romero', 'Manolo', 'Medio', '1.72', 68, 9, 29, 12),
            (148, 'Sergio', 'Castejón Bomba', 'Bomba', 'Delantero', '1.90', 85, 10, 31, 12),
            (149, 'Jesús', 'Muñoz Canela', 'Jesús', 'Delantero', '1.84', 80, 11, 25, 12),
            (150, 'Borja', 'Morán Aranda', 'Aranda', 'Portero', '1.80', 74, 1, 29, 13),
            (151, 'Jesús', 'Barroso Merino', 'Barroso', 'Defensa', '1.75', 70, 2, 26, 13),
            (153, 'Luis', 'Raudona Carretero', 'Luis', 'Defensa', '1.79', 76, 4, 31, 13),
            (154, 'Pablo', 'Arroyo Piñero', 'Pablo', 'Defensa', '1.81', 74, 5, 21, 13),
            (155, 'Luis', 'Campo Romero', 'Campos', 'Medio', '1.73', 65, 6, 20, 13),
            (156, 'Juan Luis', 'Delgado Viveros', 'Juanlu', 'Medio', '1.80', 79, 7, 26, 13),
            (157, 'Juan', 'Puntas Pardo', 'Juan', 'Medio', '1.76', 70, 8, 29, 13),
            (158, 'Antonio José', 'Moya Rico', 'Moya', 'Medio', '1.76', 74, 9, 31, 13),
            (159, 'Alberto Juan', 'Delgado Delgado', 'Alberto', 'Delantero', '1.96', 89, 10, 19, 13),
            (160, 'Manuel', 'Dunn Polo', 'Polo', 'Delantero', '1.87', 81, 11, 23, 13),
            (161, 'Carlos', 'Rodríguez Rodríguez', 'Carli', 'Delantero', '1.74', 73, 12, 25, 13),
            (162, 'Miguel', 'Castro Reyes', 'Miguel', 'Portero', '1.80', 76, 1, 29, 14),
            (163, 'Sergio', 'Dueñas Ruiz', 'Dueñas', 'Defensa', '1.76', 74, 2, 32, 14),
            (164, 'Ignacio', 'Fernández Losada', 'Nacho', 'Defensa', '1.78', 73, 3, 30, 14),
            (165, 'Guillermo', 'Pavón Díaz', 'Guillermo', 'Defensa', '1.73', 69, 4, 21, 14),
            (166, 'Ezequiel', 'Lamarca Gómez', 'Ezequiel', 'Defensa', '1.81', 75, 5, 29, 14),
            (167, 'José Francisco', 'Castro Bermudo', 'Josefran', 'Medio', '1.75', 70, 6, 34, 14),
            (168, 'Juan Francisco', 'Lazo Romero', 'Juanfran', 'Medio', '1.79', 75, 7, 30, 14),
            (169, 'Luis Mariano', 'Pérez Poyato', 'Luisma', 'Medio', '1.76', 71, 8, 26, 14),
            (170, 'Carlos', 'Úbeda Arroyo', 'Carlos', 'Medio', '1.80', 78, 9, 34, 14),
            (171, 'Fermín', 'Sánchez García', 'Fermín', 'Delantero', '1.78', 76, 10, 30, 14),
            (172, 'Juan Antonio', 'Pozo Marín', 'Pozo', 'Delantero', '1.96', 89, 11, 30, 14),
            (174, 'Juan Carlos', 'Benítez Berrufo', 'Juancar', 'Portero', '1.79', 73, 13, 30, 14),
            (175, 'José Luis', 'Gómez Gutiérrez', 'Guti', 'Medio', '2.01', 92, 18, 26, 3),
            (176, 'Juan Diego', 'Pérez Gómez', 'Juandi', 'Medio', '1.81', 79, 22, 31, 6),
            (177, 'Adrián', 'Casado Pérez', 'Adri', 'Medio', '1.73', 54, 25, 30, 3);");
        }
    }else {
      if ($jugador==='si') {

        switch ($equipo) {
          case '1':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (1, 'Ronquillo C.F.', 'El Ronquillo');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (1, 'Óscar', 'Trillo Martín', 'Osquitar', 'portero', '1.80', 80, 1, 30, 1),
            (2, 'Carlos', 'Marín Ros', 'Negro', 'Defensa', '1.72', 75, 2, 25, 1),
            (3, 'Jairo ', 'Macero Bernardino', 'Jairo', 'Defensa', '1.77', 78, 3, 27, 1),
            (5, 'José Manuel', 'Sánchez Gordo', 'Jose', 'delantero', '1.74', 78, 5, 34, 1),
            (6, 'Benito', 'Martín Martín', 'Beni', 'Medio', '1.81', 79, 6, 36, 1),
            (7, 'Juan Antonio', 'Domínguez Vargas', 'Porreto', 'Medio', '1.78', 76, 8, 28, 1),
            (8, 'Julián', 'Rodríguez Melchor', 'Juli', 'Medio', '1.74', 65, 7, 26, 1),
            (9, 'Pedro', 'Hernández García', 'Pedro', 'Defensa', '1.75', 73, 12, 18, 1),
            (11, 'Luis Miguel ', 'Romero García', 'Luismi', 'Delantero', '1.78', 68, 9, 26, 1),
            (13, 'Jose María', 'Marín Rubio', 'Josemari', 'Portero', '1.81', 93, 13, 28, 1);");
            break;
          case '2':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (2, 'Castillo C.F.', 'El Castillo de las Guardas';");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (15, 'Pedro José', 'Silva Pérez', 'Piter', 'Portero', '1.81', 80, 1, 32, 2),
            (20, 'Antonio', 'Noguera Suarez', 'Toni', 'Defensa', '1.78', 76, 2, 19, 2),
            (21, 'Miguel Ángel ', 'Silva Ruiz', 'Migue', 'Defensa', '1.83', 80, 3, 26, 2),
            (22, 'José Luis', 'Martín Villar', 'Selu', 'Defensa', '1.86', 81, 4, 29, 2),
            (23, 'José Manuel', 'Sánchez Ros', 'Sánchez', 'Defensa', '1.76', 76, 5, 21, 2),
            (24, 'Juan Antonio', 'Ramos Ojeda', 'Juanan', 'Medio', '1.81', 79, 6, 31, 2),
            (25, 'Rafael', 'Mena González', 'Rafa', 'Medio', '1.76', 72, 7, 26, 2),
            (26, 'Rafael', 'Ruiz Alonso', 'Alonso', 'Medio', '1.69', 65, 8, 21, 2),
            (27, 'Santiago', 'Gines Ramos', 'Santi', 'Medio', '1.70', 66, 9, 29, 2),
            (29, 'Manuel', 'Campos Martínez', 'Manolo', 'Delantero', '1.76', 80, 11, 26, 2);");
            break;
          case '3':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (3, 'Torre Reina C.D.', 'Torre de la Reina');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (31, 'Juan Felipe', 'Romero Gómez', 'Lipe', 'Medio', '1.79', 73, 2, 26, 3),
            (32, 'Francisco Manuel', 'Gómez Murillo', 'Manu', 'Defensa', '1.86', 79, 3, 31, 3),
            (34, 'José Juan', 'Vázquez Sánchez', 'Puche', 'Defensa', '1.83', 80, 5, 29, 3),
            (35, 'Luis', 'Cartel Pérez', 'Luis', 'Defensa', '1.69', 72, 6, 30, 3),
            (39, 'José Carlos', 'Acosta Lepe', 'Jose', 'Medio', '1.90', 83, 10, 32, 3),
            (40, 'Juan', 'Miranda Enamorado', 'Miranda', 'Delantero', '1.87', 90, 11, 29, 3),
            (41, 'José', 'Ramos Vela', 'Ramos', 'Delantero', '1.76', 75, 12, 35, 3),
            (42, 'Sergio', 'Guzmán Roldán', 'Sergi', 'Portero', '1.81', 80, 13, 24, 3),
            (175, 'José Luis', 'Gómez Gutiérrez', 'Guti', 'Medio', '2.01', 92, 18, 26, 3),
            (177, 'Adrián', 'Casado Pérez', 'Adri', 'Medio', '1.73', 54, 25, 30, 3);");
            break;
          case '4':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (4, 'C.D. Burguillos', 'Burguillos');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (43, 'Adrián', 'Valderas Rodríguez', 'Adri', 'Portero', '1.78', 76, 1, 19, 4),
            (44, 'Alejandro', 'López Rojas', 'Alex', 'Defensa', '1.84', 81, 2, 26, 4),
            (45, 'Carlos', 'Franco Murillo', 'Carlitos', 'Defensa', '1.79', 73, 3, 17, 4),
            (46, 'Daniel', 'García Fuentes', 'Dani', 'Defensa', '1.78', 76, 4, 29, 4),
            (47, 'Emilio', 'López Cid', 'Emilio', 'Defensa', '1.81', 75, 5, 30, 4),
            (48, 'Jesús', 'López Gelo', 'Jesuli', 'Medio', '1.76', 70, 6, 27, 4),
            (49, 'Ismael', 'Vázquez Herrera', 'Isma', 'Medio', '1.81', 79, 7, 19, 4),
            (50, 'Tomás', 'Bejarano Gutiérrez', 'Guti', 'Medio', '1.78', 81, 8, 26, 4),
            (51, 'Santiago', 'López Gil', 'Santi', 'Medio', '1.81', 79, 9, 19, 4),
            (52, 'Óscar', 'Herencia López', 'Óscar', 'Delantero', '1.76', 72, 10, 25, 4);");
            break;
          case '5':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (5, 'Guillena C.F.', 'Guillena');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (54, 'Álvaro', 'Díaz Jurado', 'Álvaro', 'Portero', '1.79', 80, 1, 29, 5),
            (55, 'Álvaro', 'López Ruiz', 'López', 'Defensa', '1.82', 79, 2, 28, 5),
            (57, 'Iván', 'García Fernández', 'Iván', 'Defensa', '1.78', 72, 4, 19, 5),
            (58, 'Jesús', 'Pernía Fernández', 'Jesús', 'Defensa', '1.75', 78, 5, 19, 5),
            (59, 'José Luis', 'Ruiz Farfán', 'Selu', 'Defensa', '1.85', 74, 6, 25, 5),
            (60, 'Moisés', 'Mallén Pendón', 'Moy', 'Medio', '1.76', 78, 7, 20, 5),
            (61, 'Pablo', 'Martín Caballero', 'Pablito', 'Medio', '1.78', 70, 8, 17, 5),
            (62, 'Serafín', 'Núñez Chozas', 'Serafín', 'Medio', '1.71', 69, 9, 21, 5),
            (63, 'Rodrigo', 'González Acosta', 'Rodri', 'Medio', '1.74', 74, 10, 22, 5),
            (64, 'Ramón', 'Alonso Pérez', 'Alonso', 'Delentero', '1.78', 80, 11, 23, 5),
            (65, 'Juan Manuel', 'Díaz Cárdenas', 'Juanma', 'Delantero', '1.78', 78, 12, 21, 5);");
            break;
          case '6':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (6, 'Brenes Balompié', 'Brenes');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (66, 'Alberto', 'Pérez Jiménez', 'Jiménez', 'Portero', '1.90', 88, 1, 24, 6),
            (67, 'Isaac', 'Barrul Gómez', 'Barrul', 'Medio', '2.00', 81, 2, 25, 6),
            (68, 'Miguel Ángel', 'Ramírez Sánchez', 'Migue', 'Defensa', '1.82', 74, 3, 29, 6),
            (71, 'David', 'Lara Cruz', 'David', 'Medio', '1.71', 74, 6, 31, 6),
            (72, 'Alfonso', 'Ort Baena', 'Alfonso', 'Medio', '1.80', 75, 7, 25, 6),
            (74, 'Alberto', 'Pérez Montes', 'Alberto', 'Delantero', '1.97', 83, 9, 22, 6),
            (176, 'Juan Diego', 'Pérez Gómez', 'Juandi', 'Medio', '1.81', 79, 22, 31, 6),
            (76, 'Juan', 'Bernal Jiménez', 'Chino', 'Delantero', '1.98', 89, 11, 26, 6);");
            break;
          case '7':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (7, 'Atco. Algabeño', 'La Algaba');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (78, 'Diego', 'Manas Sánchez', 'Diego', 'Portero', '1.92', 83, 1, 31, 7),
            (79, 'Álvaro', 'Morilla Dávalos', 'Álvaro', 'Defensa', '1.76', 79, 2, 26, 7),
            (80, 'Lorenzo', 'Sánchez Aragón', 'Loren', 'Defensa', '1.79', 79, 3, 29, 7),
            (82, 'Julio', 'Delgado Huertas', 'Juli', 'Defensa', '1.82', 80, 5, 26, 7),
            (83, 'Carlos', 'Díaz Serrano', 'Carlos', 'Medio', '1.72', 72, 6, 19, 7),
            (84, 'Jairo', 'Rodríguez Jiménez', 'Jairo', 'Medio', '1.80', 76, 7, 26, 7),
            (85, 'Iván', 'Gaviño López', 'Iván', 'Medio', '1.76', 76, 8, 23, 7),
            (86, 'Ezequiel', 'García García', 'Ezequiel', 'Medio', '1.80', 79, 9, 29, 7),
            (87, 'Álvaro', 'Madroñal Ruiz', 'Álvaro', 'Delantero', '1.75', 76, 10, 23, 7),
            (88, 'Luis', 'Vargas Lara', 'Vargas', 'Delantero', '2.00', 89, 11, 30, 7);");
            break;
          case '8':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (8, 'Alcalá del Río C.F.', 'Alcalá del Río');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (90, 'Aarón', 'Aguilar Pérez', 'Aarón', 'Portero', '1.87', 87, 1, 23, 8),
            (91, 'Jorge', 'Jiménez Díaz', 'Jorge', 'Defensa', '1.81', 75, 2, 22, 8),
            (92, 'Sergio', 'Osuna Bravo', 'Sergio', 'Defensa', '1.75', 74, 3, 22, 8),
            (93, 'José Carlos', 'Lorca López', 'Jose', 'Defensa', '1.72', 72, 4, 26, 8),
            (94, 'Samuel', 'García Álvarez', 'Samu', 'Defensa', '1.79', 74, 5, 29, 8),
            (95, 'Alberto', 'Ledesma Milán', 'Ledes', 'Medio', '1.80', 79, 6, 31, 8),
            (96, 'José', 'Pino Morata', 'Pino', 'Medio', '1.75', 71, 7, 23, 8),
            (97, 'Manuel', 'Randón Palop', 'Palop', 'Medio', '1.80', 78, 8, 29, 8),
            (98, 'Rafael', 'Torres Gemelo', 'Torres', 'Medio', '1.75', 71, 9, 30, 8),
            (99, 'Francisco', 'Campos Leal', 'Fran', 'Delantero', '1.84', 78, 10, 34, 8),
            (100, 'Joaquín', 'Blanco Calero', 'Juaqui', 'Delantero', '1.79', 74, 11, 29, 8),
            (101, 'José Miguel', 'Fernández Gordo', 'Josemi', 'Delantero', '1.76', 74, 12, 26, 8);");
            break;
          case '9':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (9, 'Cazallla Sierra', 'Cazalla de la Sierra');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (102, 'Daniel', 'Medián Gallardo', 'Gallardo', 'Portero', '1.80', 79, 1, 23, 9),
            (103, 'Pablo', 'Cabrera Montenegro', 'Pablo', 'Defensa', '1.79', 75, 2, 26, 9),
            (104, 'Borja', 'Suárez García', 'Borja', 'Defensa', '1.81', 79, 3, 29, 9),
            (105, 'Guillermo', 'Barcena López', 'Guille', 'Defensa', '1.78', 79, 4, 36, 9),
            (106, 'Manuel', 'Garoña García', 'Manu', 'Defensa', '1.75', 78, 5, 25, 9),
            (107, 'Sergio', 'Pelayo Fernández', 'Sergio', 'Defensa', '1.80', 78, 6, 30, 9),
            (108, 'Manuel', 'Marín Segurola', 'Marín', 'Medio', '1.78', 75, 7, 23, 9),
            (109, 'Miguel Ángel', 'Segurola Ramos', 'Migue', 'Medio', '1.75', 78, 8, 29, 9),
            (111, 'Javier', 'Rosado Cortés', 'Javi', 'Delantero', '1.75', 79, 10, 21, 9),
            (112, 'Ramón', 'Benítez Álvarez', 'Ramoni', 'Delantero', '1.74', 74, 11, 20, 9),
            (113, 'David', 'Bravo Ramírez', 'David', 'Delantero', '1.90', 82, 12, 32, 9);");
            break;
          case '10':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (10, 'Cantillana C.D.', 'Cantillana');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (114, 'Lázaro', 'Damas Cruz', 'Lázaro', 'Portero', '1.81', 78, 1, 20, 10),
            (115, 'Mariano', 'García Linero', 'Mariano', 'Defensa', '1.71', 68, 2, 23, 10),
            (116, 'José María', 'Soria Morón', 'Josemari', 'Defensa', '1.75', 70, 3, 21, 10),
            (117, 'Francisco', 'Ruiz García', 'Paco', 'Defensa', '1.78', 74, 4, 26, 10),
            (118, 'Juan', 'Sánchez Franco', 'Juan', 'Defensa', '1.81', 74, 5, 31, 10),
            (119, 'Antonio Ramón', 'Holgado Huertas', 'Ramón', 'Medio', '1.79', 76, 6, 34, 10),
            (121, 'Cristobal', 'García Pelayo', 'Cristobal', 'Medio', '1.69', 65, 8, 19, 10),
            (123, 'Agustín', 'García Remón', 'Agustín', 'Delantero', '1.87', 82, 10, 29, 10),
            (124, 'Álvaro', 'Cortés Sanvicente', 'Álvaro', 'Delantero', '1.74', 71, 11, 25, 10),
            (125, 'Iván', 'Sánchez Prieto', 'Iván', 'Portero', '1.81', 78, 12, 26, 10);");
            break;
          case '11':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (11, 'C.D. Aznalcollar', 'Aznalcollar');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (126, 'Javier', 'García Molina', 'Javi', 'Portero', '1.71', 68, 1, 29, 11),
            (127, 'Jesús', 'Manzano Daza', 'Jesuli', 'Defensa', '1.75', 68, 2, 34, 11),
            (128, 'Pablo', 'Franco Marín', 'Franco', 'Defensa', '1.75', 70, 3, 21, 11),
            (129, 'Rubén', 'Cortés Solís', 'Rubén', 'Defensa', '1.79', 74, 4, 26, 11),
            (130, 'Eloy', 'Jiménez Duque', 'Eloy', 'Defensa', '1.84', 80, 5, 30, 11),
            (131, 'Eugenio', 'Sainz Loza', 'Eugenio', 'Medio', '1.71', 65, 6, 21, 11),
            (132, 'Jorge', 'Nieto Macero', 'Jorge', 'Medio', '1.75', 74, 7, 29, 11),
            (133, 'Miguel', 'Chillón Pino', 'Miguel', 'Medio', '1.79', 74, 8, 31, 11),
            (134, 'Sergio', 'García Carillo', 'Sergio', 'Medio', '1.74', 74, 9, 24, 11),
            (135, 'Manuel', 'Soto Ossorio', 'Manu', 'Delantero', '1.74', 70, 10, 34, 11),
            (136, 'José Luis', 'Moris Vega', 'Vega', 'Delantero', '1.81', 79, 11, 30, 11),
            (137, 'Juan', 'Montero Garcés', 'Juan', 'Delantero', '1.78', 75, 12, 20, 11);");
            break;
          case '12':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (12, 'Constantina C.D.', 'Constantina');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (139, 'David', 'Ortiz Orillán', 'David', 'Portero', '1.78', 76, 1, 24, 12),
            (140, 'Francisco', 'Casáñez Martínez', 'Fran', 'Defensa', '1.81', 76, 2, 29, 12),
            (141, 'Adrián', 'Zambrano Gómez', 'Zambrano', 'Defensa', '1.78', 71, 3, 19, 12),
            (142, 'Sergio', 'Limia Durán', 'Sergio', 'Defensa', '1.74', 68, 4, 21, 12),
            (143, 'Guillermo', 'Senso Pizarro', 'Guille', 'Defensa', '1.79', 75, 5, 29, 12),
            (145, 'Fernando', 'Guisado Llaga', 'Fernand', 'Medio', '1.75', 71, 7, 30, 12),
            (146, 'Nicolás', 'Tovar Adorna', 'Tovar', 'Medio', '1.73', 71, 8, 19, 12),
            (147, 'Manuel', 'Merino Romero', 'Manolo', 'Medio', '1.72', 68, 9, 29, 12),
            (148, 'Sergio', 'Castejón Bomba', 'Bomba', 'Delantero', '1.90', 85, 10, 31, 12),
            (149, 'Jesús', 'Muñoz Canela', 'Jesús', 'Delantero', '1.84', 80, 11, 25, 12);");
            break;
          case '13':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (13, 'U.D. Santiponce', 'Santiponce');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (150, 'Borja', 'Morán Aranda', 'Aranda', 'Portero', '1.80', 74, 1, 29, 13),
            (151, 'Jesús', 'Barroso Merino', 'Barroso', 'Defensa', '1.75', 70, 2, 26, 13),
            (153, 'Luis', 'Raudona Carretero', 'Luis', 'Defensa', '1.79', 76, 4, 31, 13),
            (154, 'Pablo', 'Arroyo Piñero', 'Pablo', 'Defensa', '1.81', 74, 5, 21, 13),
            (155, 'Luis', 'Campo Romero', 'Campos', 'Medio', '1.73', 65, 6, 20, 13),
            (156, 'Juan Luis', 'Delgado Viveros', 'Juanlu', 'Medio', '1.80', 79, 7, 26, 13),
            (157, 'Juan', 'Puntas Pardo', 'Juan', 'Medio', '1.76', 70, 8, 29, 13),
            (158, 'Antonio José', 'Moya Rico', 'Moya', 'Medio', '1.76', 74, 9, 31, 13),
            (159, 'Alberto Juan', 'Delgado Delgado', 'Alberto', 'Delantero', '1.96', 89, 10, 19, 13),
            (160, 'Manuel', 'Dunn Polo', 'Polo', 'Delantero', '1.87', 81, 11, 23, 13),
            (161, 'Carlos', 'Rodríguez Rodríguez', 'Carli', 'Delantero', '1.74', 73, 12, 25, 13);");
            break;
          case '14':
            $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
            (14, 'Camas C.F.', 'Camas');");
            $connection->query("INSERT INTO `JUGADOR` (`idJugador`, `nombre`, `apellidos`, `alias`, `posicion`, `altura`, `peso`, `numero`, `edad`, `idEquipo`) VALUES
            (164, 'Ignacio', 'Fernández Losada', 'Nacho', 'Defensa', '1.78', 73, 3, 30, 14),
            (165, 'Guillermo', 'Pavón Díaz', 'Guillermo', 'Defensa', '1.73', 69, 4, 21, 14),
            (166, 'Ezequiel', 'Lamarca Gómez', 'Ezequiel', 'Defensa', '1.81', 75, 5, 29, 14),
            (167, 'José Francisco', 'Castro Bermudo', 'Josefran', 'Medio', '1.75', 70, 6, 34, 14),
            (168, 'Juan Francisco', 'Lazo Romero', 'Juanfran', 'Medio', '1.79', 75, 7, 30, 14),
            (169, 'Luis Mariano', 'Pérez Poyato', 'Luisma', 'Medio', '1.76', 71, 8, 26, 14),
            (170, 'Carlos', 'Úbeda Arroyo', 'Carlos', 'Medio', '1.80', 78, 9, 34, 14),
            (171, 'Fermín', 'Sánchez García', 'Fermín', 'Delantero', '1.78', 76, 10, 30, 14),
            (172, 'Juan Antonio', 'Pozo Marín', 'Pozo', 'Delantero', '1.96', 89, 11, 30, 14),
            (174, 'Juan Carlos', 'Benítez Berrufo', 'Juancar', 'Portero', '1.79', 73, 13, 30, 14);");
            break;
          }
        }else {
          switch ($equipo) {
            case '1':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (1, 'Ronquillo C.F.', 'El Ronquillo');");
              break;
            case '2':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (2, 'Castillo C.F.', 'El Castillo de las Guardas';");
              break;
            case '3':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (3, 'Torre Reina C.D.', 'Torre de la Reina');");
              break;
            case '4':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (4, 'C.D. Burguillos', 'Burguillos');");
              break;
            case '5':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (5, 'Guillena C.F.', 'Guillena');");
              break;
            case '6':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (6, 'Brenes Balompié', 'Brenes');");
              break;
            case '7':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (7, 'Atco. Algabeño', 'La Algaba');");
              break;
            case '8':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (8, 'Alcalá del Río C.F.', 'Alcalá del Río');");
              break;
            case '9':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (9, 'Cazallla Sierra', 'Cazalla de la Sierra');");
              break;
            case '10':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (10, 'Cantillana C.D.', 'Cantillana');");
              break;
            case '11':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (11, 'C.D. Aznalcollar', 'Aznalcollar');");
              break;
            case '12':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (12, 'Constantina C.D.', 'Constantina');");
              break;
            case '13':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (13, 'U.D. Santiponce', 'Santiponce');");
              break;
            case '14':
              $connection->query("INSERT INTO `EQUIPO` (`idEquipo`, `nombre`, `localidad`) VALUES
              (14, 'Camas C.F.', 'Camas');");
              break;
            }
        }
      }
    $connection->query("INSERT INTO Entrena VALUES (1,$equipo);");
?>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Fútbol-7</h1>
    <h4>Liga Provincial Sevillana</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h3 class="install">Instalación completada</h3>
    <hr>
  </div>
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <p class="lead">Enhorabuena, la instalación se ha completado con éxito.
      Pulse 'Aceptar' para comenzar a usarla.</p>
  <div class="form-group">
    <div class="col-xs-12">
    <div class="input-group-addon">
      <a href="usuario/index.php"><input type="button" id="submit" value="Aceptar" class="btn btn-success pull-right"></a>
    </div>
  </div>
  <br>
</div>
</div>
</div>
<?php
unlink('install.php');
    unlink('crear.php');
}else {
    header("Location: install.php");

}

 ?>



  </body>
</html>
