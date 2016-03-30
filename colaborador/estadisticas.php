<!DOCTYPE html>
<html>
<head>
  <?php include 'cabecera.php'; ?>
    <link rel="stylesheet" type="text/css" href="../usuario/css/registro.css">
</head>
<style media="screen">
  .titulo{
    text-align: center;
  }
</style>
<body>
  <?php
  include '../colaborador/include.php';
  if (isset($_SESSION['usuario'])) {

      include '../admin/conexion.php';

      if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
      }
  ?>
      <div class="row">
        <div class="col-md-12">
          <h3 class="titulo">Goles de las últimas jornadas</h3>
          <hr>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <img src="grafica.php" style="width:100%;" alt="" />
        </div>
        <div class="col-md-12">
          <h3 class="titulo">Equipos más goleadores como local</h3>
          <hr>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <img src="grafica2.php" style="width:100%;" alt="" />
        </div>
        <div class="col-md-12">
          <h3 class="titulo">Equipos más goleadores como visitante</h3>
          <hr>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <img src="grafica3.php" style="width:100%;" alt="" />
        </div>
        <div class="col-md-12">
          <h3 class="titulo">Máximos goleadores</h3>
          <hr>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <img src="grafica4.php" style="width:100%;" alt="" />
        </div>
      </div>


  <?php  }else {
      header("Location: ../usuario/index.php");
    }
      ?>
  <footer class="container-fluid text-center">
    <p>Esta página está basada en la colaboración voluntaria, por lo que no se hace responsable de la veracidad de los contenidos publicados.</p>
  </footer>
</body>
</html>
