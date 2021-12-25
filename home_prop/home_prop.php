<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_prop.html");

?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Información Personal  </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
          

            <tr><th>ID de Proponente</th><th>Número de Documento</th><th>Nombres</th><th>Apellidos</th>
            <th>Nombre de Organización</th>><th>Número de RUC</th><th>Correo</th>
            <th>Teléfono</th><th>Dirección</th><th >Opciones</th></tr>
          </thead>
        
          <?php
             
            $dni_prop = $_POST["n_doc"];
          
          
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT *
            FROM proponente            
            where ID_USUARIO='$dni_prop' limit 1;";
            
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
                echo "		<td>",$registro[7],"</td>";
                echo "		<td>",$registro[8],"</td>";
                
              
                	
                echo "     <td><a href='editarInfo.php?id=$registro[0]'>Editar </a></td>
                          ";						
                echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
          

        
        </div>   
    </div>
</main>


