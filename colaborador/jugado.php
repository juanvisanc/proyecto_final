<?php
session_start();

if (isset($_POST['jugador']) and isset($_SESSION["usuario"])) {

  $jugador=$_POST['jugador'];
  $partido=$_POST['partido'];
  $equipo=$_POST['equipo'];
  $goles=$_POST['goles'];
  $ta=$_POST['ta'];
  $tr=$_POST['tr'];

  include '../admin/conexion.php';

  if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $result = $connection->query("INSERT INTO Juego VALUES ($jugador,$partido,$goles,$ta,$tr);");
  header("Location: ../usuario/estadistica.php?idEq=$equipo&idP=$partido");
}else {
  header("Location: ../usuario/index.php");
}
 ?>
