<?php

//iniciamos sesion
session_start();

if (isset($_SESSION['usuario'])) {
  include '../admin/conexion.php';
  $tema=$_SESSION['tema'];
  $usu=$_SESSION['usuario'];
  $result = $connection->query("SELECT idEntrenador from ENTRENADOR where nombreUsu='$usu';");
  $obj = $result->fetch_object();
  if ($tema==='tema2') {?>
    <style media="screen">
    .jumbotron{
      background-image: url("../imagenes/campo.png");
      font-family: Georgia, "Times New Roman", Times, serif;
      font-style: italic;
    }
    .navbar{
      background-color: #406D19;
      font-style: italic;
    }
    .navbar-inverse .navbar-nav>li>a{
      color: black;
    }
    body{
      font-family: Georgia, "Times New Roman", Times, serif;
    }
    </style>
<?php  }elseif ($tema==='tema3') {
  ?>
    <style media="screen">
    .jumbotron{
      background-image: url("../imagenes/copas.png");
      font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
      font-style: italic;
      color: black;
    }
    .navbar{
      background-color: #449D44;
      font-style: italic;
    }
    .navbar-inverse .navbar-nav>li>a{
      color: black;
    }
    body{
      font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
    }
    </style>
<?php
}
  echo "  <nav class='navbar navbar-inverse'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
        </div>
        <div class='collapse navbar-collapse' id='myNavbar'>
          <ul class='nav navbar-nav'>
            <li><a href='../usuario/index.php'>Inicio</a></li>
            <li><a href='../usuario/clasificacion.php'>Clasificación</a></li>
            <li><a href='../usuario/calendario.php?id=1'>Calendario</a></li>
            <li><a href='../colaborador/estadisticas.php'>Estadísticas</a></li>";
            if ($_SESSION['rol']==='admin') {
              echo "
              <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Administración <span class='glyphicon  glyphicon-menu-down'></span></a>
              <ul class='dropdown-menu'>
                <li><a href='../admin/usuarios.php'>Usuarios</a></li>
                <li><a href='../admin/equipos.php'>Equipos</a></li>
                <li><a href='../admin/partidos.php'>Partidos</a></li>
              </ul>
            </li>";
            }else {
              echo"<li><a href='../usuario/contacto.php'>Contacto</a></li>";
            }
          echo "</ul>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='../colaborador/usuario.php?id=$obj->idEntrenador'><span class='glyphicon glyphicon-user' style='padding-right:5px'>
            </span>".$_SESSION['usuario']."</a></li>
            <li><a href='../usuario/logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>";
?>
  <div class="jumbotron">
    <div class="container text-center">
      <h1>Fútbol-7</h1>
      <h4>Liga Provincial Sevillana</h4>
    </div>
  </div>
  <?php
  $result->close();
  unset($obj);
  unset($connection);
      }else{
        header("Location: ../usuario/index.php");
      }

  ?>
