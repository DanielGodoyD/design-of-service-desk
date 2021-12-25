<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Gestión de Usuarios </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>
            
            <tr><td colspan='11'> 
              <form action = 'nuevoUsuario.php' method='POST'>  
                <input style='width: 290px;' type='submit' value='Nuevo'>
              </form></td>
            </tr>

            <tr><th>Número de Documento</th><th>Fecha de Nacimiento</th><th>Contraseña</th>
            <th>Tipo de Documento</th><th>Estado</th><th>ID Perfil</th>
            <th colspan='2'>Opciones</th></tr>
          </thead>
        
          <?php
            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contrase�a BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
           $sentencia = "SELECT * FROM `users` ;" ;
            
            
            /*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
            $resultado = mysqli_query($enlace,$sentencia);
            
            $numFilas = mysqli_num_rows($resultado);
            
            if ($numFilas == 0) {
              echo "No existen usuarios registrados <br>";
            }
            else {
             
              
              /*Estoy definiendo una iteraci�n*/
              for ($i=1; $i <= $numFilas; $i++){
                /*Esta funci�n permite obtener un registro (fila) del resultado de un query*/
                $registro = mysqli_fetch_row($resultado);
                                
                echo "	<tr>";
                echo "		<td>",$registro[0],"</td>";
                echo "		<td>",$registro[1],"</td>";
                echo "		<td>",$registro[2],"</td>";
                echo "		<td>",$registro[3],"</td>";
                echo "		<td>",$registro[4],"</td>";
                echo "		<td>",$registro[5],"</td>";
                
              
                echo "		<td><a href='editarUsuario.php?id_usuario=$registro[0]'>Editar </a></td>
                          <td><a href='eliminarUsuario.php?id_usuario=$registro[0]'>Eliminar </a></td>";						
                echo "	</tr>";					
              }
              echo "</table>";
            }
          ?>
          

        
        </div>   
    </div>
</main>