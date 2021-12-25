<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Editar Proponente </h1>


<div class="form1">
<?php
			$id_donat = $_GET["id_donat"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT ID_PROPONENTE, ID_USUARIO, NOMBRES,APELLIDOS,
            NOM_ORG, RUC,CORREO, TELEFONO, DIRECCION, ESTADO
             FROM proponente 
             JOIN users
             ON proponente.ID_USUARIO = users.NRO_DOC
             WHERE ID_PROPONENTE='$id_donat' ;";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editDonatario.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Proponente: </td><td><input style='width: 290px;' name='id_donat' type='text' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Número de Documento: </td><td><input style='width: 290px;' name='n_doc' type='number' value='$fila[1]' ></td></tr> ";
			echo "<tr><td >Nombres: </td><td><input style='width: 290px;' name='nombre' type='text' value='$fila[2]' ></td></tr> ";
			echo "<tr><td >Apellidos:</td><td> <input style='width: 290px;' name='apellido' type='text' value='$fila[3]'> </td></tr>";
			
			
			echo "<tr><td >Nombre de Organización:</td><td> <input style='width: 290px;' name='n_org' type='text' value='$fila[4]'></td></tr> ";
			
			echo "<tr><td >Número de RUC:</td><td> <input style='width: 290px;' name='ruc' type='number' value='$fila[5]'></td></tr> ";
			echo "<tr><td >Correo:</td><td> <input style='width: 290px;' name='correo' type='text' value='$fila[6]'></td></tr> ";
			echo "<tr><td >Teléfono:</td><td> <input style='width: 290px;' name='tel' type='number' value='$fila[7]'></td></tr> ";
			echo "<tr><td >Dirección:</td><td> <input style='width: 290px;' name='dir' type='text' value='$fila[8]'></td></tr> ";
			echo "<tr><td>Estado:</td><td align='center'>";
            if ($fila[9]=='ACTIVO') {
				echo "<input name='est' type='radio' value='ACTIVO' checked>ACTIVO";
				echo "<input name='est' type='radio' value='INACTIVO'>INACTIVO</td></tr>";
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


</html>