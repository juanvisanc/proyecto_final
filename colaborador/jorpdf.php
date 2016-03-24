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
      $id=$_GET['id'];
        // Logo
        $this->Image('../imagenes/cabecera.png',10,8,190);
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Salto de línea
        $this->Ln(40);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(60,10,"Jornada $id",1,0,'C');
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
    $result = $connection->query("SELECT p.*, l.nombre as local,v.nombre as visitante,
      l.idEquipo as lo,v.idEquipo as vi FROM EQUIPO l, PARTIDO p, EQUIPO v
      WHERE l.idEquipo=p.idEquipoL and p.idEquipoV=v.idEquipo and jornada=$id;");


    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(15);
    $pdf->Cell(35, 8, utf8_decode('Local'), 0);
    $pdf->Cell(35, 8, 'Resultado', 0);
    $pdf->Cell(35, 8, 'Visitante', 0);
    $pdf->Cell(35, 8, 'Fecha', 0);
    $pdf->Cell(35, 8, 'Localidad', 0);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', 10);
    while($obj = $result->fetch_object()) {
      $pdf->Cell(10);
    	$pdf->Cell(30, 8,utf8_decode("$obj->local"), 0);
      $pdf->Cell(15);
    	$pdf->Cell(12, 8,"$obj->golesL:$obj->golesV", 0);
      $pdf->Cell(13);
    	$pdf->Cell(12, 8,utf8_decode("$obj->visitante"), 0);
      $pdf->Cell(25);
    	$pdf->Cell(12, 8,"$obj->fecha", 0);
      $pdf->Cell(22);
    	$pdf->Cell(12, 8,utf8_decode("$obj->localidad"), 0);
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
