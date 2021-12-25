<?php
			
            $id_concurso= $_POST["id_con"];
            			
			$id_proponente = $_POST["id_prop"];
            $nombre_proyecto= $_POST["n_proy"];
           
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "INSERT INTO proyectos (ID_CONCURSO,ID_PROPONENTE,NOMBRE_PROY) 
						 VALUES ('$id_concurso','$id_proponente','$nombre_proyecto')
						  
						  ";
			
			mysqli_query($enlace,$sentencia1);
						
			header("Location:../home_prop/mis_proy.php");

		?>