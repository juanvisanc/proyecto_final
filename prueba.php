<?php
       include("jpgraph/jpgraph.php");
       include("jpgraph/jpgraph_bar.php");
       include("admin/conexion.php");

       $consulta="SELECT SUM(golesL)+SUM(golesV) as goles,jornada from PARTIDO group by jornada desc limit 4;";

       $result=$connection->query($consulta);

       while($fila=$result->fetch_object()){
          $label[]=$fila->jornada;
          $datos[]=$fila->goles;
       }

       $grafico = new Graph(1200,500,'auto');
       $grafico->SetScale("textint");
       $grafico->xaxis->title->Set("jornada");
       $grafico->xaxis->SetTickLabels($label);
       $grafico->yaxis->title->Set("goles");

       $barplot1 = new BarPLot($datos);
       $barplot1->SetFillGradient("#0174DF","#2E9AFE",GRAD_HOR);
       $barplot1->SetWidth(80);

       $grafico->add($barplot1);

       $grafico->stroke();
       $grafico->stroke("IMG.PNG");
?>
