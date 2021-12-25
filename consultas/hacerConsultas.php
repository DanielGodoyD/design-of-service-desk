<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_prop.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Realizar Consultas sobre Concursos </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
            

            <tr><th>ID Concurso</th><th>Nombre</th><th>Fecha de Inicio</th>
            <th>Fecha de Finalización</th><th>Descripción</th>
            <th>Estado</th></tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT *
             FROM concursos WHERE ESTADO='ACTIVO' ORDER BY ID_CONCURSO;";
            
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
                echo "		<td>",$registro[4],"</td>";
                echo "		<td>",$registro[5],"</td>";
                
               
              
                /*echo "		<td><a href='editarConcurso.php?id=$registro[0]'>Editar </a></td>
                          <td><a href='eliminarConcurso.php?id=$registro[0]'>Eliminar </a></td>";						
                
                          echo "	</tr>";		 */			
              }
              echo "</table>";
            }
          ?>
          
        </div>  
        
        
        <br><br>
   
            <h2 style="text-align:center;">Realice su consulta</h2>

              <form  action="NewConsulta.php" id='1' method="POST">
                
                      <table style='margin-left:auto;margin-right:auto;'>
                      
                
                     <tr><td>ID del Concurso:</td><td> <input style='width: 290px;' name='id_con' type='number' placeholder='7' > </td></tr>
                
                                          
                      <tr><td >Consulta: </td><td>
            
                        <textarea name='descrip' form='1' style='width: 290px ;' placeholder='Realice su consulta ...'> </textarea>
                        </td></tr>
                      <tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
                    
             </form>	
                     
    </div>	
</main>