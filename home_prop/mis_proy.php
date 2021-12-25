<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_prop.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Mis Proyectos  </h1>


<main>
    <div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table" style='margin-left:auto;margin-right:auto;'>
          <thead>
            
            <tr><td colspan='4'> 
              <form action = '' method='POST'>  
                 Ingrese su ID de Proponente: <input style='width: 290px;' type='text' name='id_prop'>
                 <br><input type="submit" name='insertar_id' value="Grabar">

              </form></td>
            </tr>

            <tr><th>ID Proyecto</th><th>ID Concurso</th><th>Nombre del Proyecto</th>
            <th>Estado</th>
            
          </thead>
        
          <?php

if(isset($_POST['insertar_id'])){ //check if form was submitted
    $id_prop = $_POST['id_prop']; //get input text
    
   


            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT *
             FROM proyectos WHERE ID_PROPONENTE='$id_prop' ORDER BY ID_CONCURSO;";
            
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
            
                echo "		<td>",$registro[3],"</td>";
               
                echo "		<td>",$registro[6],"</td>";
                                            
                echo "	</tr>";					
              }
              echo "</table>";
            }


        } 

          ?>
          

        
        </div>   
    </div>
</main>


