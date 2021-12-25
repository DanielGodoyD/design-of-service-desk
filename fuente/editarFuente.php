<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Editar Fuente   </h1>


<div class="form1">
<?php
			$id_fuente = $_GET["id_fuente"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT NOMBRE_EMPRESA, RUC, PAIS, REPRESENTANTE, TIPO_DOCUMENTO,NUMERO_DOCUMENTO, CORREO, ESTADO
			FROM fuente_financiera where ID_FUENTE_FINANCIERA='$id_fuente';";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editFuente.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Fuente Financiera: </td><td><input style='width: 290px;' name='id_fuente' type='text' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Nombre de la empresa: </td><td><input style='width: 290px;' name='nombre_empresa' type='text' value='$fila[1]' ></td></tr> ";
			echo "<tr><td >RUC:</td><td> <input style='width: 290px;' name='ruc' type='text' value='$fila[2]'> </td></tr>";
			
			
			echo "<tr><td >Pais:</td><td> <input style='width: 290px;' name='pais' type='text' value='$fila[3]'></td></tr> ";
			echo "<tr><td >Representante:</td><td> <input style='width: 290px;' name='representante' type='text' value='$fila[4]'></td></tr> ";
			echo "<tr><td >Tipo de Documento:</td><td> <input style='width: 290px;' name='tipo_documento' type='text' value='$fila[5]'></td></tr> ";
			echo "<tr><td >Numero de Documento:</td><td> <input style='width: 290px;' name='numero_documento' type='text' value='$fila[6]'></td></tr> ";
			echo "<tr><td >Correo:</td><td> <input style='width: 290px;' name='correo' type='text' value='$fila[7]'></td></tr> ";
			echo "<tr><td>Estado:</td><td align='center'>";
            if ($fila[8]=='ACTIVO') {
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