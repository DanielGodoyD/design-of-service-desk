<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Editar Vinculación   </h1>


<div class="form1">
<?php
			$id = $_GET["id"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			/*$sentencia = "SELECT ID_VINCULO, c.ID_CONCURSO, ID_COMITE, ID_TRABAJADOR  
            FROM `miembro/comite/concurso` AS c 
            JOIN `concursos`
            USING (ID_CONCURSO)
            ORDER BY ID_CONCURSO,ID_COMITE, ID_TRABAJADOR;";  */

            $sentencia = "SELECT ID_VINCULO, ID_CONCURSO, ID_COMITE, ID_TRABAJADOR  
            FROM `miembro/comite/concurso` 
            
            ORDER BY ID_CONCURSO,ID_COMITE, ID_TRABAJADOR;";  
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editVincular.php' method='POST'>";
			/* USO DE " READONLY "*/
			
            echo "<tr><td >ID Vínculo: </td><td><input style='width: 290px;' name='id_vin' type='number' value='$fila[0]' readonly></td></tr> ";
            
            echo "<tr><td >ID Concurso: </td><td><input style='width: 290px;' name='id_con' type='number' value='$fila[1]' ></td></tr> ";
            
            echo "<tr><td >ID Comite: </td><td><input style='width: 290px;' name='id_com' type='number' value='$fila[2]' ></td></tr> ";
            
            echo "<tr><td >ID Trabajador: </td><td><input style='width: 290px;' name='id_tra' type='number' value='$fila[3]' ></td></tr> ";
			
            /* boton de submit*/
            echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	