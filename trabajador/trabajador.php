<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Relación de Trabajadores   </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
            <tr><td colspan='9'> 
              <form action = 'nuevoTrabajador.php' method='POST'>  
                 <input style='width: 290px;' type='submit' value='Nuevo'>
              </form></td>
            </tr>

            <tr><th>ID Trabajador</th><th>Número de Documento</th><th>Nombres</th><th>Apellidos</th>
            <th>Correo</th><th>Perfil</th>
            <th>Estado</th><th colspan='2'>Opciones</th></tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT ID_TRABAJADOR, t.NRO_DOC, NOMBRES, APELLIDOS, CORREO , b.PERFIL, b.ESTADO , b.ID_PERFIL 
            FROM trabajador AS t
            JOIN (
              SELECT NRO_DOC, u.ID_PERFIL, p.PERFIL, ESTADO
                FROM users AS u
                JOIN perfil AS p
                ON u.ID_PERFIL = p.ID_PERFIL
            ) AS b
            ON t.NRO_DOC = b.NRO_DOC;";
            
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
                echo "		<td>",$registro[6],"</td>";
                
              
                	/*	<td><a href='asignarComCon.php?id=$registro[0]'>Asignar Comité y Concurso </a></td>  */
                echo "     <td><a href='editarTrabajador.php?id=$registro[0]'>Editar </a></td>
                          <td><a href='eliminarTrabajador.php?id_user=$registro[1]'>Eliminar </a></td>";						
                echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
          

        
        </div>   
    </div>
</main>