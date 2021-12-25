<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_cti.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> FASE 0 </h1>


<main>
    
<div class="table-container">
      <div class="table-horizontal-container">
        <table class="unfixed-table">
          <thead>

          <tr><td colspan='11'> 
              <form action = '' method='POST'>  
                 Ingrese ID del concurso a evaluar: <input style='width: 290px;' type='text' name='id_concurso'>
                 <br><input type="submit" name='insertar_id' value="Grabar">

              </form></td>
            </tr>
            
          <tr><th>ID Proyecto</th><th>Nombre Proyecto</th><th>ID de Concurso</th>
            <th>ID Proponente</th>
            <th>Nombres Lider</th><th>Apellidos Lider</th>
            <th>Correo </th><th>Criterios de Evaluación</th>
            <th>Aprueba el Criterio</th><th> Estado </th>
            <th colspan='1'>Opciones</th></tr>

           
          </thead>
        
        
          <?php

if(isset($_POST['insertar_id'])){ //check if form was submitted
  $id_concurso = $_POST['id_concurso']; //get input text

            /*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
            $enlace = mysqli_connect("localhost","root","","ads"); 
            
            /*Sentencia de consulta - SELECT*/
            $sentencia = "SELECT P.ID_PROYECTO, NOMBRE_PROY, P.ID_CONCURSO, 
            D.ID_PROPONENTE, NOMBRES, APELLIDOS, CORREO
            FROM proyectos AS P 
            JOIN proponente AS D
            ON P.ID_PROPONENTE = D.ID_PROPONENTE 
            WHERE P.ID_CONCURSO = $id_concurso
            ORDER BY P.ID_PROYECTO;";
            
            $sentencia2= " SELECT ID_CRITERIO, NOMBRE_CRITERIO, ID_FASE
                            FROM criterio
                            WHERE ID_FASE='1'
                            ORDER BY ID_CRITERIO;
                       
            ";
            

            /*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
            $resultado = mysqli_query($enlace,$sentencia);
            
            $numFilas = mysqli_num_rows($resultado);

            /* la otra sentencia para obtener nombre de criterios*/

            $resultado2 = mysqli_query($enlace,$sentencia2);
            
            $numFilas2 = mysqli_num_rows($resultado2);


            
            if ($numFilas == 0) {
              echo "No existen donatarios registrados <br>";
            }
            else {
              
              $names = array();
              for ($j=1; $j <= $numFilas2; $j++){
                   
                $registro2 = mysqli_fetch_row($resultado2);                            
                $names[]= $registro2[1];

              }  

              /*Estoy definiendo una iteración*/
              for ($i=1; $i <= $numFilas; $i++){
                /*Esta función permite obtener un registro (fila) del resultado de un query*/
                $registro = mysqli_fetch_row($resultado);
                $registro2 = mysqli_fetch_row($resultado2);

                $sentencia3= " SELECT *
                            FROM evaluacion
                            WHERE ID_PROYECTO=$registro[0] AND ID_FASE='1'
                            ORDER BY ID_CRITERIO;";
                       
                $resultado3 = mysqli_query($enlace,$sentencia3);

                  $yesno = array();
                                    for ($m=1; $m <= $numFilas2; $m++){
                                        
                                      $registro3 = mysqli_fetch_row($resultado3);                            
                                          
                                        if($registro3){	  	
                                            $yesno[]= $registro3[4];
                                        } else {
                                            $yesno[]='Falta evaluar';
                                        }	

                                    }  

                $sentencia4= " SELECT *
                            FROM eva_fase
                            WHERE ID_PROYECTO=$registro[0] AND ID_FASE='1'
                            ;";
                       
                $resultado4 = mysqli_query($enlace,$sentencia4);
                
                $registro4 = mysqli_fetch_row($resultado4);
               
                      if($registro4){	  	
                        $approved= $registro4[3];
                    } else {
                        $approved='Falta evaluar';
                    }	
                
                echo "	<tr>";
                echo "		<td rowspan='$numFilas2'>",$registro[0],"</td>";
                echo "		<td rowspan='$numFilas2'>",$registro[1],"</td>";
                echo "		<td rowspan='$numFilas2'>",$registro[2],"</td>";
                echo "		<td rowspan='$numFilas2'>",$registro[3],"</td>";
                echo "		<td rowspan='$numFilas2'>",$registro[4],"</td>";
                echo "		<td rowspan='$numFilas2'>",$registro[5],"</td>";
                echo "		<td rowspan='$numFilas2'>",$registro[6],"</td>";

                echo "		<td>$names[0]</td>";
                echo "		<td>  $yesno[0] </td>";
                echo "		<td rowspan='$numFilas2'>$approved</td>";
                echo "		<td rowspan='$numFilas2'><a href='editarFase1.php?id=$registro[0]&num=$numFilas2'>Evaluar </a></td>";
                
                					
                echo "	</tr>";	

                  for ($n=1; $n <= $numFilas2-1; $n++){
                                                                   
                          echo "	<tr>";                        
                          echo "		<td>",$names[$n],"</td>";
                          echo "		<td> $yesno[$n] </td>";                                 
                          echo "	</tr>";	
                    }  
                               
              }
              
            }


          } 
            echo "</table>";  
          ?>
                
        
    </div>
</main>


