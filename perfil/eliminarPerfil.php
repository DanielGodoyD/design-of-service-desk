<?php
			
            
            $id= $_GET["id_perfil"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "DELETE FROM perfil where ID_PERFIL='$id';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:../perfil/perfil.php");			
?>