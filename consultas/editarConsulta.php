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
			$id = $_GET["id"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT * 
            FROM consultas WHERE ID_CONSULTA = '$id';";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editConsulta.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Consulta: </td><td><input style='width: 290px;' name='id_cons' type='number' value='$fila[0]' readonly></td></tr> ";
            echo "<tr><td >ID Concurso: </td><td><input style='width: 290px;' name='id_conc' type='number' value='$fila[1]' readonly></td></tr> ";
            echo "<tr><td >Consulta: </td><td><input style='width: 290px;' name='con' type='text' value='$fila[2]' readonly></td></tr> ";
            
            echo "<tr><td >Aprobado por DE: </td><td align='center'>";
            if ($fila[4]=='SI') {
				echo "<input name='estado' type='radio' value='SI' checked>SI";
				echo "<input name='estado' type='radio' value='NO'>NO</td></tr>";
			} 
			else {
				echo "<input name='estado' type='radio' value='SI'>SI";
				echo "<input name='estado' type='radio' value='NO' checked>NO</td></tr>";
			}
			
            echo "<tr><td >Respuesta: </td><td><input style='width: 290px;' name='rpta' type='text' value='$fila[3]' ></td></tr> ";
            
            echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	