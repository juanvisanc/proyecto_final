
    <?php

    //para llamada ajax
    if (isset($_POST['usuario'])) {
      include 'conexion.php';

      if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
      }
      $usuario=$_POST['usuario'];
      $result = $connection->query("SELECT nombreUsu FROM ENTRENADOR WHERE nombreUsu='$usuario';");
      if ($result->num_rows===0) {
        echo 1;
      }else {
        echo 0;
      }
    }else {
      header("Location: ../usuario/index.php");
    }


     ?>
