<?php
  session_start();

  //si se pasa el id de partido y se es admin
  if (isset($_GET['id']) and isset($_GET['jornada']) and isset($_SESSION["usuario"])) {
    if($_SESSION['rol']==='admin'){
      include 'conexion.php';

      if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
      }

      $id=$_GET['id'];
      $jornada=$_GET['jornada'];

      $result = $connection->query("DELETE FROM PARTIDO WHERE idPartido=$id;");


      unset($connection);

        header("Location: ../usuario/calendario.php?id=$jornada");


    }else {
      header("Location: ../usuario/index.php");
    }

  }else {
    header("Location: ../usuario/index.php");
  }
  ?>
 ?>
