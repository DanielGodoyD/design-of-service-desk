<?php
			
            
            $id_criterio= $_GET["id_criterio"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "DELETE from criterio where ID_CRITERIO='$id_criterio';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:criterio.php");			
?>