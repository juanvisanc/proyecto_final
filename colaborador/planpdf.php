<?php
session_start();

if (isset($_SESSION['usuario'])) {
  if (isset($_GET['id'])) {

    $id=$_GET['id'];
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
    $result = $connection->query("SELECT nombre FROM EQUIPO WHERE idEquipo=$id;");
    $obj = $result->fetch_object();

    $result2 = $connection->query("select * from JUGADOR WHERE idEquipo=$id;");

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'BU', 18);
    $pdf->Cell(68);
    $pdf->Cell(35, 8, utf8_decode($obj->nombre), 0);
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(15);
    $pdf->Cell(35, 8, utf8_decode('Número'), 0);
    $pdf->Cell(30, 8, 'Alias', 0);
    $pdf->Cell(35, 8, 'Nombre', 0);
    $pdf->Cell(35, 8, 'Apellidos', 0);
    $pdf->Cell(35, 8, utf8_decode('Posición'), 0);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', 10);
    while($obj2 = $result2->fetch_object()) {
      $pdf->Cell(20);
      $pdf->Cell(12, 8,$obj2->numero, 0);
      $pdf->Cell(18);
    	$pdf->Cell(20, 8,utf8_decode($obj2->alias), 0);
      $pdf->Cell(9);
    	$pdf->Cell(12, 8,utf8_decode($obj2->nombre), 0);
      $pdf->Cell(22);
    	$pdf->Cell(12, 8,utf8_decode($obj2->apellidos), 0);
      $pdf->Cell(25);
    	$pdf->Cell(12, 8,$obj2->posicion, 0);
      $pdf->Ln(8);
    }

    $pdf->Output();
  }else {
    header("Location: ../usuario/index.php");
  }
}else {
  header("Location: ../usuario/index.php");
}
?>
