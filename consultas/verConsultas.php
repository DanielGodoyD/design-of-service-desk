<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Gestión de Consultas </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
            

            <tr><th>ID Consulta</th><th>ID Concurso</th><th>Consulta</th>
            <th>Respuesta</th><th>Aprobado por DE</th><th colspan='2'>Opciones</th></tr>
            
          </thead>
        
          <?php
            /*La funcion de enlace NECESITA: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT *
             FROM consultas;";
            
            /*La funcion de ejecucion de query NECESITA: el enlace a BD, la sentencia (query)*/
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
                echo "		<td>",$registro[4],"</td>";
               
                              
              
                echo "		<td><a href='editarConsulta.php?id=$registro[0]'>Editar </a></td>
                          <td><a href='eliminarConsulta.php?id=$registro[0]'>Eliminar </a></td>";						
                
                          echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
          
        </div>  
        
        
    </div>

</main>