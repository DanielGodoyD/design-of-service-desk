<?php
			
			$id_fase= $_POST["id_fase"];
			
			$fase= $_POST["fase"];
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "UPDATE fase set 
						  FASE = '$fase'
						
						
						  where ID_FASE='$id_fase';";
			
			mysqli_query($enlace,$sentencia);

			
header("Location:fases.php");			
?>