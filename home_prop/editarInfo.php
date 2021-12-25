<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_prop.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Editar Información Personal   </h1>


<div class="form1">
<?php
			$id = $_GET["id"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT * 
            FROM proponente WHERE ID_PROPONENTE = '$id';";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editInfo.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Proponente: </td><td><input style='width: 290px;' name='id_prop' type='number' value='$fila[0]' readonly></td></tr> ";
            echo "<tr><td >Número de Documento: </td><td><input style='width: 290px;' name='n_doc' type='number' value='$fila[1]' readonly></td></tr> ";
            echo "<tr><td >Nombres: </td><td><input style='width: 290px;' name='na' type='text' value='$fila[2]' ></td></tr> ";
            echo "<tr><td >Apellidos: </td><td><input style='width: 290px;' name='ap' type='text' value='$fila[3]' ></td></tr> ";
            echo "<tr><td >Nombre de Organización: </td><td><input style='width: 290px;' name='n_org' type='text' value='$fila[4]' ></td></tr> ";
            echo "<tr><td >Número de RUC: </td><td><input style='width: 290px;' name='n_ruc' type='number' value='$fila[5]' ></td></tr> ";
            echo "<tr><td >Correo: </td><td><input style='width: 290px;' name='correo' type='text' value='$fila[6]' ></td></tr> ";
            echo "<tr><td >Teléfono: </td><td><input style='width: 290px;' name='tel' type='number' value='$fila[7]' ></td></tr> ";
            echo "<tr><td >Dirección: </td><td><input style='width: 290px;' name='dir' type='text' value='$fila[8]' ></td></tr> ";
            
            echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	