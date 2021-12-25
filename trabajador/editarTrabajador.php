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
			$sentencia = "SELECT ID_TRABAJADOR, t.NRO_DOC, NOMBRES, APELLIDOS, CORREO , b.PERFIL, b.ESTADO , b.ID_PERFIL 
            FROM trabajador AS t
            JOIN (
              SELECT NRO_DOC, u.ID_PERFIL, p.PERFIL, ESTADO
                FROM users AS u
                JOIN perfil AS p
                ON u.ID_PERFIL = p.ID_PERFIL
            ) AS b
            ON t.NRO_DOC = b.NRO_DOC;";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editTrabajador.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Trabajador: </td><td><input style='width: 290px;' name='id_trab' type='number' value='$fila[0]' readonly></td></tr> ";
			echo "<tr><td >Número de Documento: </td><td><input style='width: 290px;' name='n_doc' type='number' value='$fila[1]' readonly></td></tr> ";
			echo "<tr><td >Nombres:</td><td> <input style='width: 290px;' name='name' type='text' value='$fila[2]'> </td></tr>";
			echo "<tr><td >Apellidos: </td><td><input style='width: 290px;' name='lastname' type='text' value='$fila[3]'></td></tr> ";
			
			echo "<tr><td >Correo:</td><td> <input style='width: 290px;' name='correo' type='text' value='$fila[4]'></td></tr> ";
			echo "<tr><td >Perfil Actual:</td><td> <input style='width: 290px;' name='perf' type='text' value='$fila[5]' readonly></td></tr> ";
            echo "<tr><td>Cambiar Perfil: </td> 
               <td><select name='perfil'>";
			
			$sentencia1 = "SELECT * FROM perfil ;";
			$resultado1 = mysqli_query($enlace, $sentencia1);			
			
			$numFilas1 = mysqli_num_rows($resultado1);
			
			/*Estoy definiendo una iteración*/
			for ($i=1; $i <= $numFilas1; $i++){
				/*Esta función permite obtener un registro (fila) del resultado de un query*/
                $registro1 = mysqli_fetch_row($resultado1);
                
                echo "<option value='",$registro1[0],"'>",$registro1[1],"</option>";
                
			}
			echo "</select></td></tr>";
            
			echo "<tr><td>Estado: </td><td align='center'>";
            if ($fila[6]=='ACTIVO') {
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


