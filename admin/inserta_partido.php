<?php
    session_start();

    //si es admin y ademas se ha pasado por post
    if (isset($_SESSION['usuario']) and $_SESSION['rol']==='admin' and isset($_POST['local'])) {
    include 'conexion.php';

    if ($connection->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $local=$_POST['local'];
    $visitante=$_POST['visitante'];
    $fecha=$_POST['fecha'];
    $localidad=$_POST['localidad'];
    $jornada=$_POST['jornada'];

    $connection->query("INSERT INTO PARTIDO VALUES (null,$local,$visitante,null,null,'$fecha','$localidad',$jornada);");
    header("Location: ../admin/partidos.php");
  }else {
    header('Location: ../usuario/index.php');
  }
 ?>
