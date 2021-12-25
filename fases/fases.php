<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Fases  </h1>


<main>
  
     
       
        <table style='margin-left:auto;margin-right:auto;'>
          <thead>
            
     
        
         
            
            <tr><td colspan='11'> 
              <form action = 'nuevaFase.php' method='POST'>  
                 <input style='width: 290px;' type='submit' value='Nuevo'>
              </form></td>
            </tr>

            <tr><th>ID Fase</th><th>Fase</th><th colspan='2'>Opciones</th></tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT ID_FASE, FASE
             FROM fase ORDER BY ID_FASE;";
            
            /*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
            $resultado = mysqli_query($enlace,$sentencia);
            
            $numFilas = mysqli_num_rows($resultado);
            
            if ($numFilas == 0) {
              echo "No existen fases registradas <br>";
            }
            else {
             
              
              /*Estoy definiendo una iteración*/
              for ($i=1; $i <= $numFilas; $i++){
                /*Esta función permite obtener un registro (fila) del resultado de un query*/
                $registro = mysqli_fetch_row($resultado);
                                
                echo "	<tr>";
                echo "		<td>",$registro[0],"</td>";
                echo "		<td>",$registro[1],"</td>";
              
                echo "		<td><a href='editarFase.php?id_fase=$registro[0]'><center>Editar</center> </a></td>
                          <td><a href='eliminarFase.php?id_fase=$registro[0]'><center>Eliminar</center> </a></td>";						
                echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
        </div>
        </div>
     
       
  
</main>


