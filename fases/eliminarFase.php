<?php
			
            
            $id_fase= $_GET["id_fase"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "DELETE from fase where ID_FASE='$id_fase';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:fases.php");			
?>