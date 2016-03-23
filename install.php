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
  .bd{
    text-align: center;
  }
  .error{
    color: red;
    font-size: 0.9em;
  }
</style>
<body>
  <div class="jumbotron">
    <div class="container text-center">
      <h1>Fútbol-7</h1>
      <h4>Liga Provincial Sevillana</h4>
    </div>
  </div>
<?php if (!isset($_POST['nombre'])): ?>
  <div class="row">
    <div class="col-md-12">
      <h3 class="bd">Conexión a la Base de Datos</h3>
      <hr>
    </div>
    <div class="col-md-6 col-md-offset-3">
      <form id="registerForm" method="POST" action="install.php">
        <div class="form-group">
          <div class="col-xs-6">
            <label for="InputName">Nombre de la Base de Datos</label>
            <div class="input-group">
              <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            </div>
            <br>
            <label for="InputName">Dirección del servidor</label>
            <div class="input-group">
              <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            </div>
            <hr>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6">
            <label for="InputName">Usuario de la Base de Datos</label>
            <div class="input-group">
              <input type="text" id='user' class="form-control" name="usuario" placeholder="Usuario" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            </div>
            <br>
            <label for="InputName">Contraseña</label>
            <div class="input-group">
              <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            </div>
            <hr>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group-addon">
            <input type="submit" name="enviar" id="submit" value="Guardar" class="btn btn-success pull-right">
          </div>
        </div>
      </form>

    </div>
  </div>

<?php else: ?>
  <?php
    $bd=$_POST['nombre'];
    $dir=$_POST['direccion'];
    $usuario=$_POST['usuario'];
    $pass=$_POST['password'];

    $connection = new mysqli("$dir", "$usuario", "$pass", "$bd");
    //$conection->set_charset("utf8");
    mysqli_set_charset($connection, "utf8");

    if ($connection->connect_errno) { ?>
      <div class="row">
        <div class="col-md-12">
          <h3 class="bd">Conexión a la Base de Datos</h3>
          <hr>
        </div>
        <div class="col-md-6 col-md-offset-3">
          <form id="registerForm" method="POST" action="install.php">
            <div class="form-group">
              <div class="col-xs-6">
                <label for="InputName">Nombre de la Base de Datos</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                </div>
                <br>
                <label for="InputName">Dirección del servidor</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                </div>
                <hr>
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-6">
                <label for="InputName">Usuario de la Base de Datos</label>
                <div class="input-group">
                  <input type="text" id='user' class="form-control" name="usuario" placeholder="Usuario" required>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                </div>
                <br>
                <label for="InputName">Contraseña</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                </div>
                <hr>
              </div>
            </div>
            <p class="error">Has introducido mal algún dato. Por favor, introdúzcalos correctamente.<p>
            <div class="form-group">
              <div class="input-group-addon">
                <input type="submit" name="enviar" id="submit" value="Guardar" class="btn btn-success pull-right">
              </div>
            </div>
          </form>

        </div>
      </div>
  <?php }else {
    $cadena1="$"."connection = new mysqli('$dir', '$usuario', '$pass', '$bd');";
    $cadena2="mysqli_set_charset("."$"."connection, 'utf8');";
    $archivo=fopen("./admin/conexion.php","a");
    fwrite($archivo,"<?php"."\n");
    fwrite($archivo, "$cadena1"."\n");
    fwrite($archivo, "$cadena2"."\n");
    fwrite($archivo, "?>"."\n");
    fclose($archivo);

    $connection->query("CREATE TABLE IF NOT EXISTS `EQUIPO` (
      `idEquipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `nombre` varchar(45) NOT NULL,
      `localidad` varchar(45) DEFAULT NULL,
      PRIMARY KEY (`idEquipo`)
      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;");

    $connection->query("CREATE TABLE IF NOT EXISTS `ENTRENADOR` (
      `idEntrenador` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `nombre` varchar(45) NOT NULL,
      `apellidos` varchar(100) DEFAULT NULL,
      `correo` varchar(100) DEFAULT NULL,
      `nombreUsu` varchar(50) DEFAULT NULL,
      `password` varchar(64) DEFAULT NULL,
      `tema` varchar(45) DEFAULT 'tema1',
      `rol` varchar(20) DEFAULT NULL,
      PRIMARY KEY (`idEntrenador`),
      UNIQUE KEY `nombreUsu_UNIQUE` (`nombreUsu`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;");

    $connection->query("CREATE TABLE IF NOT EXISTS `Colabora` (
      `idEntrenador` int(10) unsigned NOT NULL,
      `idEquipo` int(10) unsigned NOT NULL,
      PRIMARY KEY (`idEntrenador`,`idEquipo`),
      KEY `fk_Colabora_2_idx` (`idEquipo`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

    $connection->query("CREATE TABLE IF NOT EXISTS `Entrena` (
      `idEntrenador` int(10) unsigned NOT NULL,
      `idEquipo` int(10) unsigned NOT NULL,
      PRIMARY KEY (`idEntrenador`,`idEquipo`),
      KEY `fk_Entrena_2_idx` (`idEquipo`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

    $connection->query("CREATE TABLE IF NOT EXISTS `JUGADOR` (
      `idJugador` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `nombre` varchar(45) DEFAULT NULL,
      `apellidos` varchar(100) DEFAULT NULL,
      `alias` varchar(45) NOT NULL,
      `posicion` varchar(45) DEFAULT NULL,
      `altura` decimal(10,2) unsigned DEFAULT NULL,
      `peso` tinyint(3) unsigned DEFAULT NULL,
      `numero` tinyint(3) unsigned DEFAULT NULL,
      `edad` tinyint(3) unsigned DEFAULT NULL,
      `idEquipo` int(10) unsigned NOT NULL,
      PRIMARY KEY (`idJugador`),
      KEY `fk_Jugador_1_idx` (`idEquipo`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;");

    $connection->query("CREATE TABLE IF NOT EXISTS `PARTIDO` (
      `idPartido` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `idEquipoL` int(10) unsigned DEFAULT NULL,
      `idEquipoV` int(10) unsigned DEFAULT NULL,
      `golesL` int(10) unsigned DEFAULT NULL,
      `golesV` int(10) unsigned DEFAULT NULL,
      `fecha` date DEFAULT NULL,
      `localidad` varchar(45) DEFAULT NULL,
      `jornada` int(11) NOT NULL,
      PRIMARY KEY (`idPartido`),
      KEY `fk_PARTIDO_1_idx` (`idEquipoL`),
      KEY `fk_PARTIDO_2_idx` (`idEquipoV`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;");

    $connection->query("CREATE TABLE IF NOT EXISTS `Juego` (
      `idJugador` int(10) unsigned NOT NULL,
      `idPartido` int(10) unsigned NOT NULL,
      `goles` int(10) unsigned DEFAULT '0',
      `tarjetasA` int(10) unsigned DEFAULT '0',
      `tarjetasR` int(10) unsigned DEFAULT NULL,
      PRIMARY KEY (`idJugador`,`idPartido`),
      KEY `fk_Juego_2_idx` (`idPartido`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

    $connection->query("ALTER TABLE `Colabora`
      ADD CONSTRAINT `fk_Colabora_1` FOREIGN KEY (`idEntrenador`) REFERENCES `ENTRENADOR` (`idEntrenador`) ON DELETE CASCADE ON UPDATE CASCADE,
      ADD CONSTRAINT `fk_Colabora_2` FOREIGN KEY (`idEquipo`) REFERENCES `EQUIPO` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;
    ");

    $connection->query("ALTER TABLE `Entrena`
      ADD CONSTRAINT `fk_Entrena_1` FOREIGN KEY (`idEntrenador`) REFERENCES `ENTRENADOR` (`idEntrenador`) ON DELETE CASCADE ON UPDATE CASCADE,
      ADD CONSTRAINT `fk_Entrena_2` FOREIGN KEY (`idEquipo`) REFERENCES `EQUIPO` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;");

    $connection->query("ALTER TABLE `Juego`
      ADD CONSTRAINT `fk_Juego_1` FOREIGN KEY (`idJugador`) REFERENCES `JUGADOR` (`idJugador`) ON DELETE CASCADE ON UPDATE CASCADE,
      ADD CONSTRAINT `fk_Juego_2` FOREIGN KEY (`idPartido`) REFERENCES `PARTIDO` (`idPartido`) ON DELETE CASCADE ON UPDATE CASCADE;");

    $connection->query("ALTER TABLE `JUGADOR`
      ADD CONSTRAINT `fk_Jugador_1` FOREIGN KEY (`idEquipo`) REFERENCES `EQUIPO` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;");

    $connection->query("ALTER TABLE `PARTIDO`
      ADD CONSTRAINT `fk_PARTIDO_1` FOREIGN KEY (`idEquipoL`) REFERENCES `EQUIPO` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE,
      ADD CONSTRAINT `fk_PARTIDO_2` FOREIGN KEY (`idEquipoV`) REFERENCES `EQUIPO` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;");

    ?>

    <div class="row">
      <div class="col-sm-12 text-center">
        <h3>Crear usuario</h3>
        <hr>
      </div>
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
      <form id="registerForm" method="POST" action="crear.php">
        <div class="form-group">
          <div class="col-xs-6">
            <label for="InputName">Nombre</label>
            <div class="input-group">
              <input type="text" class="form-control" name="nombre"
              placeholder="Nombre" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            </div>
            <br>
            <label for="InputName">Apellidos</label>
            <div class="input-group">
              <input type="text" class="form-control" name="apellidos"
              placeholder="Apellidos" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
            </div>
            <hr>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label for="InputName">Usuario de la aplicación</label>
            <div class="input-group">
              <input type="text" id='user' class="form-control" name="usuario" placeholder="Usuario" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            </div>
            <br>
            <label for="InputName">Contraseña</label>
            <div class="input-group">
              <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            </div>
            <hr>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <label for="InputEmail">Email</label>
            <div class="input-group">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            </div>
            <br>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <label for="InputCity">Equipo</label>

              <div class="input-group">
                <select name="equipo" class="form-control" required>
                  <option value='1'>Ronquillo C.F.</option>";
                  <option value='2'>Castillo C.F.</option>";
                  <option value='3'>Torre Reina C.D.</option>";
                  <option value='4'>C.D. Burguillos</option>";
                  <option value='5'>Guillena C.F.</option>";
                  <option value='6'>Brenes Balompié</option>";
                  <option value='7'>Atco. Algabeño</option>";
                  <option value='8'>Alcalá del Río C.F.</option>";
                  <option value='9'>Cazallla Sierra</option>";
                  <option value='10'>Cantillana C.D.</option>";
                  <option value='11'>C.D. Aznalcollar</option>";
                  <option value='12'>Constantina C.D.</option>";
                  <option value='13'>U.D. Santiponce</option>";
                  <option value='14'>Camas C.F.</option>";
                </select>
                <span class="input-group-addon"><span class="glyphicon  glyphicon-menu-down"></span></span>
              </div>
              <br>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <label for="InputStreetName">¿Quieres cargar los equipos por defecto?</label>
            <div class="input-group">
              <div class="form-inline required">
                <div class="form-group has-feedback">
                  <label class="input-group">
                    <span class="input-group-addon">
                <input type="radio" name="defecto" value="si" required/>
              </span>
                    <div class="form-control form-control-static" id='entre'>
                      Sí
                    </div>
                    <span class="glyphicon form-control-feedback "></span>
                  </label>
                </div>
                <div class="form-group has-feedback ">
                  <label class="input-group">
                    <span class="input-group-addon">
                            <input type="radio" name="defecto" value="no" required/>
                        </span>
                    <div class="form-control form-control-static" id='cola'>
                      No
                    </div>
                    <span class="glyphicon form-control-feedback"></span>
                  </label>
                </div>
              </div>
            </div>
            <br>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <label for="InputStreetName">¿Quieres cargar los jugadores por defecto?</label>
            <div class="input-group">
              <div class="form-inline required">
                <div class="form-group has-feedback">
                  <label class="input-group">
                    <span class="input-group-addon">
                <input type="radio" name="jugador" value="si" required/>
              </span>
                    <div class="form-control form-control-static" id='entre'>
                      Sí
                    </div>
                    <span class="glyphicon form-control-feedback "></span>
                  </label>
                </div>
                <div class="form-group has-feedback ">
                  <label class="input-group">
                    <span class="input-group-addon">
                            <input type="radio" name="jugador" value="no" required/>
                        </span>
                    <div class="form-control form-control-static" id='cola'>
                      No
                    </div>
                    <span class="glyphicon form-control-feedback"></span>
                  </label>
                </div>
              </div>
            </div>
            <br>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group-addon">
            <input type="submit" name="enviar" id="submit" value="Guardar" class="btn btn-success pull-right">
          </div>
        </div>
      </div>
    </div>

  <?php }?>
<?php endif ?>


</body>

</html>
