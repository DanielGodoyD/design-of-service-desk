<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Editar Comité   </h1>


<div class="form1">
<?php
			$id = $_GET["id"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT * 
            FROM comite WHERE ID_COMITE = '$id';";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editComite.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Comite: </td><td><input style='width: 290px;' name='id' type='number' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Tipo: </td><td><input style='width: 290px;' name='tipo' type='text' value='$fila[1]' ></td></tr> ";
            echo "<tr><td >Inicio de Operación: </td><td><input style='width: 290px;' name='fecha' type='date' value='$fila[2]' ></td></tr> ";
            
            echo "<tr><td>Estado: </td><td align='center'>";
            if ($fila[3]=='ACTIVO') {
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