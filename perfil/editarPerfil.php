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
			$id = $_GET["id_perfil"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT ID_PERFIL, PERFIL 
            FROM perfil WHERE ID_PERFIL = '$id';";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editPerfil.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Perfil: </td><td><input style='width: 290px;' name='id_perfil' type='number' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Nombre de Perfil: </td><td><input style='width: 290px;' name='n_perfil' type='text' value='$fila[1]' ></td></tr> ";
            
            echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	
