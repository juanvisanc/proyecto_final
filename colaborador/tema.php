<?php
  session_start();
  if (isset($_POST['tema'])) {
    include '../admin/conexion.php';

    $tema=$_POST['tema'];
    $usuario=$_SESSION['usuario'];

    $connection->query("UPDATE ENTRENADOR SET tema = '$tema'
      WHERE nombreUsu=$usuario;");

      $_SESSION['tema']=$tema;
      header("Location: ../usuario/index.php");

  }else {
    header("Location: ../usuario/index.php");
  }

 ?>
