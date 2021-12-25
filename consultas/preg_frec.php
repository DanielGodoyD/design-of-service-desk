<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_prop.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Preguntas Frecuentes </h1>


<main>
<div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table" style='margin-left:auto;margin-right:auto;'>
          <thead>
            
            

            <tr><th>ID Concurso</th><th>Nombre</th><th>Consulta</th>
            <th>Respuesta</th>
            </tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT cons.ID_CONCURSO, conc.NOMBRE, CONSULTA, RESPUESTA
             FROM consultas AS cons
             JOIN concursos AS conc
             USING(ID_CONCURSO)
             WHERE APROBADO_DE = 'SI' 
              ORDER BY ID_CONCURSO;";
            
            /*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
            $resultado = mysqli_query($enlace,$sentencia);
            
            $numFilas = mysqli_num_rows($resultado);
            
            if ($numFilas == 0) {
              echo "No existen donatarios registrados <br>";
            }
            else {
             
              
              /*Estoy definiendo una iteración*/
              for ($i=1; $i <= $numFilas; $i++){
                /*Esta función permite obtener un registro (fila) del resultado de un query*/
                $registro = mysqli_fetch_row($resultado);
                                
                echo "	<tr>";
                echo "		<td>",$registro[0],"</td>";
                echo "		<td>",$registro[1],"</td>";
                echo "		<td>",$registro[2],"</td>";
                echo "		<td>",$registro[3],"</td>";
                
		
              }
              echo "</table>";
            }
          ?>
          



        </div>
    </div>
</main>