<?php
			
			$id_proyecto= $_POST["id_proy"];
			$nom_proyecto = $_POST["n_proy"];
			$id_concurso = $_POST["id_conc"];
			$id_proponente = $_POST["id_lider"];
			$nom_lider = $_POST["n_lider"];
			$ap_lider = $_POST["a_lider"];
			$correo = $_POST["correo"];

			$cr1 = $_POST["cr1"];
		
			
			$comentarios= $_POST["comment"];
			$estado_fase0 = $_POST["est_fase0"];

			/* creación de array */

			
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de INSERTAR */
			
			
		    $sentencia1 = "INSERT INTO evaluacion (ID_CRITERIO, ID_PROYECTO, ID_FASE, EVALUACION) 
						VALUES ('24', '$id_proyecto', '7', '$cr1');   ";

					mysqli_query($enlace,$sentencia1);		
			
				
			
			$sentencia2 ="INSERT INTO  eva_fase (ID_PROYECTO, ID_FASE, ESTADO, COMENTARIO)
						VALUES ('$id_proyecto', '7', '$estado_fase0','$comentarios')   ";
						

			mysqli_query($enlace,$sentencia2);

			header("Location:../fase4/fase4.php");

		?>