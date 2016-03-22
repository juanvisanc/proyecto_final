<!DOCTYPE html>
<html>
<head>
  <?php include '../colaborador/cabecera.php' ?>
    <link rel="stylesheet" type="text/css" href="../admin/css/usuarios.css">
</head>
  <body>
    <?php
        include '../colaborador/include.php';


        //solo si es admin
        if (isset($_SESSION['usuario']) and $_SESSION['rol']==='admin') {

            $connection = new mysqli("localhost", "usufutbol", "usufutbol", "futbol2");
            //$conection->set_charset("utf8");
            mysqli_set_charset($connection, "utf8");

            if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
            }

      ?>
      <div class="row">
        <div class="col-sm-12">
          <h3 class="colabora">Equipos</h3>
          <hr>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Localidad</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar<th>
              </tr>
            </thead>

            <?php
                if($result = $connection->query("SELECT * FROM EQUIPO;")){
                  while($obj = $result->fetch_object()) {

                    echo "<tr>";
                    echo "<td>".$obj->nombre."</td>";
                    echo "<td>".$obj->localidad."</td>";
                    echo "<td class='text-center'><a href='editaequipo.php?id=$obj->idEquipo'>
                    <span class='glyphicon glyphicon-edit'/></a></td>";
                    echo "<td class='text-center'><a href='eliminaequipo.php?id=$obj->idEquipo'>
                    <span class='glyphicon glyphicon-trash'/></a></td></tr>";
                }
                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<th class='text-center'>Añadir</th>";
                echo "<td class='text-center'><a href='equipo_nuevo.php'>
                <span class='glyphicon glyphicon-plus'/></a></td></tr>";
                echo "</table>";

              }
             ?>

      <?php  }else{
          header("Location: ../usuario/index.php");
        }
    ?>
  </div>
</div>
    <footer class="container-fluid text-center">
      <p>Esta página está basada en la colaboración voluntaria, por lo que no se hace responsable de la veracidad de los contenidos publicados.</p>
    </footer>
  </body>
</html>
