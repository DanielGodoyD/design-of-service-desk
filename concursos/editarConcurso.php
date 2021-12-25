<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Editar Concurso  </h1>


<div class="form1">
<?php
			$id = $_GET["id"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT * 
            FROM concursos WHERE ID_CONCURSO = '$id';";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  id='1' action='editConcurso.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Concurso: </td><td><input style='width: 290px;' name='id' type='number' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Nombre: </td><td><input style='width: 290px;' name='name' type='text' value='$fila[1]' ></td></tr> ";
            echo "<tr><td >Fecha de Inicio: </td><td><input style='width: 290px;' name='f_ini' type='date' value='$fila[2]' ></td></tr> ";
            echo "<tr><td >Fecha de Finalización: </td><td><input style='width: 290px;' name='f_fin' type='date' value='$fila[3]' ></td></tr> ";
            echo "<tr><td >Descripción: </td><td>
            
            <textarea name='descrip' form='1' style='width: 290px ;'>$fila[4] </textarea>
            </td></tr> ";
            
            echo "<tr><td>Estado: </td><td align='center'>";
            if ($fila[5]=='ACTIVO') {
				echo "<input name='est' type='radio' value='ACTIVO' checked>ACTIVO";
				echo "<input name='est' type='radio' value='INACTIVO'>INACTIVO </td></tr>";
			} 
			else {
				echo "<input name='est' type='radio' value='ACTIVO'>ACTIVO";
				echo "<input name='est' type='radio' value='INACTIVO' checked>INACTIVO </td></tr>";
			}
            echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	