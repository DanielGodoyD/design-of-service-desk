<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Gestión de Proponentes </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
            <tr><td colspan='11'> 
              <form action = 'nuevoDonatario.php' method='POST'>  
                 <input style='width: 290px;' type='submit' value='Nuevo'>
              </form></td>
            </tr>

            <tr><th>ID Proponente</th><th>Número de Documento</th><th>Nombres</th><th>Apellidos</th>
            <th>Nombre de organización</th>
            <th>Número de RUC</th><th>Correo</th><th>Teléfono</th>
            <th>Dirección</th><th>Estado</th><th colspan='2'>Opciones</th></tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT ID_PROPONENTE, ID_USUARIO, NOMBRES,APELLIDOS,
            NOM_ORG, RUC,CORREO, TELEFONO, DIRECCION, ESTADO
             FROM proponente 
             JOIN users
             ON proponente.ID_USUARIO = users.NRO_DOC
             ORDER BY ID_PROPONENTE;";
            
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
                echo "		<td>",$registro[9],"</td>";
              
                echo "		<td><a href='editarDonatario.php?id_donat=$registro[0]'>Editar </a></td>
                          <td><a href='eliminarDonatario.php?id_donat=$registro[0]'>Eliminar </a></td>";						
                echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
          

        
        </div>   
    </div>
</main>


