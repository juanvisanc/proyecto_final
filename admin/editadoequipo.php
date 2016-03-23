<?php
    session_start();


    //si se pasa nombre del equipo y es admin
    if (isset($_POST['nombre']) and isset($_SESSION["usuario"])) {
      if($_SESSION['rol']==='admin'){
        include 'conexion.php';

        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $mysqli->connect_error);
          exit();
        }
        $nombre=$_POST['nombre'];
        $localidad=$_POST['localidad'];
        $id=$_POST['id'];
        $result = $connection->query("UPDATE EQUIPO SET nombre='$nombre',localidad='$localidad' where idEquipo=$id;");
          header("Location: ../admin/equipos.php");
    }else {
      header("Location: ../usuario/index.php");
    }
  }else {
      header("Location: ../usuario/index.php");
  }
    ?>
