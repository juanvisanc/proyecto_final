<?php
       include("../jpgraph/jpgraph.php");
       include("../jpgraph/jpgraph_bar.php");
       include("../admin/conexion.php");

       $consulta="SELECT sum(golesV) as goles, e.nombre as nombre from PARTIDO p, EQUIPO e where
p.idEquipoV=e.idEquipo group by idEquipoV order by goles desc limit 4;";

       $result=$connection->query($consulta);

       while($fila=$result->fetch_object()){
          $label[]=$fila->nombre;
          $datos[]=$fila->goles;
       }

       $grafico = new Graph(900,500,'auto');
       $grafico->SetScale("textint");
       $grafico->xaxis->title->Set("EQUIPO");
       $grafico->xaxis->SetTickLabels($label);
       $grafico->yaxis->title->Set("GOLES");

       $barplot1 = new BarPLot($datos);
       $barplot1->SetFillGradient("#00FF00","#33FF33",GRAD_HOR);
       $barplot1->SetWidth(80);

       $grafico->add($barplot1);

       $grafico->stroke();
?>
