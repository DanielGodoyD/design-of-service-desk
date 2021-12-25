<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Relación de Comités   </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
            <tr><td colspan='9'> 
              <form action = 'nuevoComite.php' method='POST'>  
                 <input style='width: 290px;' type='submit' value='Nuevo'>
              </form></td>
            </tr>

            <tr><th>ID Comité</th><th>Tipo</th><th>Estado</th><th>Inicio de Operación</th>
            <th>Concurso Asignado</th><th colspan='2'>Opciones</th></tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 

            $sentencia =  " SELECT ID_COMITE,TIPO, ESTADO, FECHA_CRE, NOMBRE
            FROM `comite`  
            LEFT JOIN (
                SELECT ID_COMITE, NOMBRE
                FROM `miembro/comite/concurso`
                JOIN `concursos`
                USING (ID_CONCURSO)
               )AS CTE
            USING (ID_COMITE);
            ";
            
                       
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
                
                
              
                echo "		
                          <td><a href='editarComite.php?id=$registro[0]'>Editar </a></td>
                          <td><a href='eliminarComite.php?id=$registro[0]'>Eliminar </a></td>";						
                echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
          

        
        </div>   
    </div>
</main>