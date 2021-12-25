<?php
			
			$id_criterio= $_POST["id_criterio"];
			
			$criterio = $_POST["criterio"];
			$id_fase = $_POST["id_fase"];
			
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "UPDATE criterio set 
						  NOMBRE_CRITERIO = '$criterio',
						  ID_FASE= '$id_fase'
						 
						  where ID_CRITERIO='$id_criterio';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:../criterio/criterio.php");			
		?>