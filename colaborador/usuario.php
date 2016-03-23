<!DOCTYPE html>
<html>
<head>
  <?php include 'cabecera.php'; ?>
    <link rel="stylesheet" type="text/css" href="../usuario/css/registro.css">
</head>
<style media="screen">
  img{
    width: 98%;
  }
</style>
<body>
  <?php
  include '../colaborador/include.php';
  if (isset($_SESSION['usuario']) and isset($_GET['id'])) {

      include '../admin/conexion.php';

      if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
      }

      $id=$_GET['id'];
      $usuario=$_SESSION['usuario'];
      $equipo=$_SESSION['equipo'];
      $result = $connection->query("SELECT * FROM ENTRENADOR where idEntrenador=$id and nombreUsu='$usuario';");
      if ($result->num_rows===1) {
        $obj = $result->fetch_object();
        ?>
        <div class="row">
          <div class="col-md-12">
            <h3 class="colabora"><?php echo "$obj->nombre $obj->apellidos"; ?></h3>
            <hr>
          </div>
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <table class="table table-hover">
              <?php
              echo "<tr>";
              echo "<th class='col-md-6'>Nombre</th>";
              echo "<td>".$obj->nombre."</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>Apellidos</th>";
              echo "<td>".$obj->apellidos."</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>Nombre de usuario</th>";
              echo "<td>".$obj->nombreUsu."</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>Email</th>";
              echo "<td>".$obj->correo."</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>Colabora como</th>";
              echo "<td>".$obj->rol."</td>";
              echo "</tr>";

               ?>
             </table>
            <label for="InputStreetName">Tema</label>
            <form id="registerForm" method="POST" action="tema.php">
            <table class="table table-hover text-center">
              <tr>
                <td><img src="../imagenes/tema1.png"></td>
                <td><img src="../imagenes/tema2.png"></td>
                <td><img src="../imagenes/tema3.png"></td>
              </tr>
              <tr>
                <td><div class="form-group has-feedback ">
                  <label class="input-group">
                    <span class="input-group-addon">
                            <input type="radio" name="tema" value="tema1"
                        required/>
                        </span>
                    <div class="form-control form-control-static">
                      Tema 1
                    </div>
                    <span class="glyphicon form-control-feedback"></span>
                  </label>
                </div></td>
                <td><div class="form-group has-feedback ">
                  <label class="input-group">
                    <span class="input-group-addon">
                            <input type="radio" name="tema" value="tema2"
                        required/>
                        </span>
                    <div class="form-control form-control-static">
                      Tema 2
                    </div>
                    <span class="glyphicon form-control-feedback"></span>
                  </label>
                </div></td>
                <td><div class="form-group has-feedback ">
                  <label class="input-group">
                    <span class="input-group-addon">
                            <input type="radio" name="tema" value="tema3"
                        required/>
                        </span>
                    <div class="form-control form-control-static">
                      Tema 3
                    </div>
                    <span class="glyphicon form-control-feedback"></span>
                  </label>
                </div></td>
              </tr>
            </table>
            <div class="form-group">
              <div class="input-group-addon">
                <input type="submit" name="enviar" id="submit" value="Guardar" class="btn btn-success pull-right">
              </div>
            </div>
          </form>
            </div>
          </div>


    <?php }else {
        header("Location: ../usuario/index.php");
      }

    }else {
      header("Location: ../usuario/index.php");
    }
      ?>
  <footer class="container-fluid text-center">
    <p>Esta página está basada en la colaboración voluntaria, por lo que no se hace responsable de la veracidad de los contenidos publicados.</p>
  </footer>
</body>
</html>
