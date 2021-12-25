<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Gesti&oacuten de Usuarios  </h1>


<div class="form1">
<?php
			$id_usuario = $_GET["id_usuario"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contrase�a BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT NRO_DOC, TIPO_DOC, ID_PERFIL, CUMPLEAÑOS, PASSWORD, ESTADO
             FROM `users` where NRO_DOC='$id_usuario' ;";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editUsuario.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >Número de Documento: </td><td><input style='width: 290px;' name='id_usuario' type='number' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Tipo de Documento: </td><td><input style='width: 290px;' name='tipo_doc' type='text' value='$fila[1]' ></td></tr> ";
			echo "<tr><td >ID Perfil: </td><td><input style='width: 290px;' name='id_perfil' type='number' value='$fila[2]' ></td></tr> ";
			echo "<tr><td >Fecha de Nacimiento: </td><td><input style='width: 290px;' name='fecha' type='date' value='$fila[3]' ></td></tr> ";
			echo "<tr><td >Password: </td><td><input style='width: 290px;' name='pass' type='password' value='$fila[4]' ></td></tr> ";
			echo "<tr><td >Estado: </td><td align='center'>";
            if ($fila[5]=='ACTIVO') {
				echo "<input name='estado' type='radio' value='ACTIVO' checked>ACTIVO";
				echo "<input name='estado' type='radio' value='INACTIVO'>INACTIVO</td></tr>";
			} 
			else {
				echo "<input name='estado' type='radio' value='ACTIVO'>ACTIVO";
				echo "<input name='estado' type='radio' value='INACTIVO' checked>INACTIVO </td></tr>";
			}
			
           
			echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	


</html>