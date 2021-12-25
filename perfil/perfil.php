<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Relación de Perfiles   </h1>

<?php
				include("../clases/clases.php");
				$objP = new Perfil();
				
				$resultado = $objP->ObtenerPerfiles();
				
				$numFilas = mysqli_num_rows($resultado);
				
				if ($numFilas == 0) {
					echo "No existen perfiles registrados <br>";
				}
				else {
					echo "<table style='margin-left:auto;margin-right:auto;'>";
                    echo "
                        <tr><td colspan='4'> 
                            <form action = 'nuevoPerfil.php' method='POST'>  
                            <input style='width: 290px;' type='submit' value='Nuevo'>
                            </form></td>
                         </tr>                                       
                    ";
                    
                    echo "	<tr>";
					echo "		<td>Id Perfil</td>";
                    echo "		<td>Nombre de Perfil</td>";	
                    echo "		<td colspan='2'>Opciones</td>";			
					echo "	</tr>";
					
					/*Estoy definiendo una iteración*/
					for ($i=1; $i <= $numFilas; $i++){
						/*Esta función permite obtener un registro (fila) del resultado de un query*/
						$registro = mysqli_fetch_row($resultado);
						echo "	<tr>";
						echo "		<td>",$registro[0],"</td>";
						echo "		<td>",$registro[1],"</td>";
						
                        echo "		<td><a href='editarPerfil.php?id_perfil=$registro[0]'>Editar</a></td> 
                                    <td><a href='eliminarPerfil.php?id_perfil=$registro[0]'>Eliminar</a></td>";						
						echo "	</tr>";					
					}
					echo "</table>";
				}
			?>