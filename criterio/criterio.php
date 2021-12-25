<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"><TT> Gesti&oacuten de Criterios </TT></h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
            <tr><td colspan='11'> 
              <form action = 'nuevoCriterio.php' method='POST'>  
                <input style='width: 290px;' type='submit' value='Nuevo'>
              </form></td>
            </tr>

            <tr><th>ID Criterio</th><th>Criterio</th><th>Fase</th>
            <th colspan='2'>Opciones</th></tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT ID_CRITERIO, NOMBRE_CRITERIO, FASE
             FROM criterio,fase 
             where criterio.ID_FASE=fase.ID_FASE
             ORDER BY ID_CRITERIO;";
         
          
            /*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
            $resultado = mysqli_query($enlace,$sentencia);
            
            $numFilas = mysqli_num_rows($resultado);
            
            if ($numFilas == 0) {
              echo "No existen criterios registrados <br>";
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
                
                echo "		<td><a href='editarCriterio.php?id_criterio=$registro[0]'><center>Editar </a></td>
                          <td><a href='eliminarCriterio.php?id_criterio=$registro[0]'><center>Eliminar </a></td>";						
                echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
          

        
        </div>   
    </div>
</main>