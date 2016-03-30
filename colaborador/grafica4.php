<?php
       include("../jpgraph/jpgraph.php");
       include("../jpgraph/jpgraph_bar.php");
       include("../admin/conexion.php");

       $consulta="SELECT sum(j.goles) as goles, ju.alias AS alias,e.nombre as equipo from Juego j,JUGADOR ju,EQUIPO e
WHERE j.idJugador=ju.idJugador and ju.idEquipo=e.idEquipo GROUP BY ju.idJugador order by goles desc limit 5;";

       $result=$connection->query($consulta);

       while($fila=$result->fetch_object()){
          $label[]=$fila->alias." ".$fila->equipo;
          $datos[]=$fila->goles;
       }

       $grafico = new Graph(900,500,'auto');
       $grafico->SetScale("textint");
       $grafico->xaxis->title->Set("JUGADOR Y EQUIPO");
       $grafico->xaxis->SetTickLabels($label);
       $grafico->yaxis->title->Set("GOLES");

       $barplot1 = new BarPLot($datos);
       $barplot1->SetFillGradient("#FFFF00","#FFFF33",GRAD_HOR);
       $barplot1->SetWidth(80);

       $grafico->add($barplot1);

       $grafico->stroke();
?>
