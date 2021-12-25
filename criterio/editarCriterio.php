<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Tabla   </h1>


<div class="form1">
<?php
			$id_criterio = $_GET["id_criterio"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT ID_CRITERIO, NOMBRE_CRITERIO, ID_FASE
			FROM criterio where ID_CRITERIO='$id_criterio';";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editCriterio.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Criterio: </td><td><input style='width: 290px;' name='id_criterio' type='text' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Criterio: </td><td><input style='width: 290px;' name='criterio' type='text' value='$fila[1]' ></td></tr> ";
			echo "<tr><td >ID Fase:</td><td> <input style='width: 290px;' name='id_fase' type='number' value='$fila[2]'> </td></tr>";
			
			echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	


</html>