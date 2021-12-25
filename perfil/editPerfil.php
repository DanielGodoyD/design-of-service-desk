<?php
			
			$id= $_POST["id_perfil"];
			$nombre = $_POST["n_perfil"];
			
			
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "UPDATE perfil set 
						  PERFIL = '$nombre'
						  

						  where ID_PERFIL='$id';";
			
			mysqli_query($enlace,$sentencia1);
			
			

			header("Location:../perfil/perfil.php");

		?>