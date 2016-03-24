<?php
session_start();

if (isset($_SESSION['usuario'])) {
  require('../fpdf/fpdf.php');
  include '../admin/conexion.php';
  class PDF extends FPDF
  {
  // Cabecera de página
  function Header()
  {
      // Logo
      $this->Image('../imagenes/cabecera.png',10,8,190);
      // Arial bold 15
      $this->SetFont('Arial','B',18);
      // Salto de línea
      $this->Ln(40);
      // Movernos a la derecha
      $this->Cell(60);
      // Título
      $this->Cell(60,10,utf8_decode('Clasificación'),1,0,'C');
      // Salto de línea
      $this->Ln(30);
  }

  // Pie de página
  function Footer()
  {
      // Posición: a 1,5 cm del final
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Número de página
      $this->Cell(0,10,utf8_decode('Esta página está basada en la colaboración voluntaria, por lo que no se hace responsable de la veracidad de los contenidos publicados.'),0,0,'C');
  }
  }

  $consulta="SELECT equipo, e.nombre, SUM(G) as Ganados, SUM(E) as Empatados, SUM(P) as Perdidos,
  SUM(puntos) as puntos
    FROM
    (
    -- PARA CUANDO EL EQUIPO ES LOCAL
    SELECT
      idEquipoL Equipo,
      IF(golesL > golesV,1,0) G,
      IF(golesL = golesV,1,0) E,
      IF(golesL < golesV,1,0) P,
      golesL GL,
      golesV GV,
      CASE
          WHEN golesL > golesV THEN 3
          WHEN golesL = golesV THEN 1
          ELSE 0
      END puntos
    FROM PARTIDO

    UNION ALL
    -- PARA CUANDO EL EQUIPO ES VISITANTE
    SELECT
      idEquipoV,
      IF(golesL < golesV,1,0),
      IF(golesL = golesV,1,0),
      IF(golesL > golesV,1,0),
      golesL,
      golesV,
      CASE
          WHEN golesL < golesV THEN 3
          WHEN golesL = golesV THEN 1
          ELSE 0
      END puntos
    FROM PARTIDO) as totales
    JOIN EQUIPO e ON totales.equipo = e.idEquipo
    group by equipo order by puntos desc;";

    $result = $connection->query($consulta);
    $cont=1;

  // Creación del objeto de la clase heredada
  $pdf = new PDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(22);
  $pdf->Cell(24, 8, utf8_decode('Posición'), 0);
  $pdf->Cell(30, 8, 'Equipo', 0);
  $pdf->Cell(24, 8, 'P. Ganados', 0);
  $pdf->Cell(28, 8, 'P. Empatados', 0);
  $pdf->Cell(24, 8, 'P. Perdidos', 0);
  $pdf->Cell(24, 8, 'Puntos', 0);
  $pdf->Ln(8);
  $pdf->SetFont('Arial', '', 10);
  while($obj = $result->fetch_object()) {
    $pdf->Cell(28);
    $pdf->Cell(12, 8,$cont, 0);
    $pdf->Cell(5);
  	$pdf->Cell(30, 8,utf8_decode($obj->nombre), 0);
    $pdf->Cell(9);
  	$pdf->Cell(12, 8,$obj->Ganados, 0);
    $pdf->Cell(13);
  	$pdf->Cell(12, 8,$obj->Empatados, 0);
    $pdf->Cell(14);
  	$pdf->Cell(12, 8,$obj->Perdidos, 0);
    $pdf->Cell(8);
  	$pdf->Cell(12, 8,$obj->puntos, 0);
  	$pdf->Ln(8);
    $cont=$cont+1;
  }
  $pdf->Output();
}else {
  header("Location: ../usuario/index.php");
}
?>
