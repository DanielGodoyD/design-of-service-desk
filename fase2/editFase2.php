<?php
			
			$id_proyecto= $_POST["id_proy"];
			$nom_proyecto = $_POST["n_proy"];
			$id_concurso = $_POST["id_conc"];
			$id_proponente = $_POST["id_lider"];
			$nom_lider = $_POST["n_lider"];
			$ap_lider = $_POST["a_lider"];
			$correo = $_POST["correo"];

			$cr1 = $_POST["cr1"];
			$cr2 = $_POST["cr2"];
			$estandar = $_POST["ests"];
			$p_amb = $_POST["p_amb"];
			$p_gen = $_POST["p_gen"];
			$p_soc = $_POST["p_soc"];
		
			
			$comentarios= $_POST["comment"];
			$estado_fase0 = $_POST["est_fase0"];

			/* creación de array */

			$valores = array($cr1,$cr2, $estandar, $p_amb, $p_gen, $p_soc);
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de INSERTAR */
			
			for( $j=0; $j <= 2; $j++){
				$cri = $j+11;
				$sentencia1 = "INSERT INTO evaluacion (ID_CRITERIO, ID_PROYECTO, ID_FASE, EVALUACION) 
						VALUES ('$cri', '$id_proyecto', '3', '$valores[$j]');   ";

					mysqli_query($enlace,$sentencia1);		
            }
            
            for( $j=3; $j <= 5; $j++){
				$cri = $j+16;
				$sentencia1 = "INSERT INTO evaluacion (ID_CRITERIO, ID_PROYECTO, ID_FASE, EVALUACION) 
						VALUES ('$cri', '$id_proyecto', '3', '$valores[$j]');   ";

					mysqli_query($enlace,$sentencia1);		
            }
				
			
			$sentencia2 ="INSERT INTO  eva_fase (ID_PROYECTO, ID_FASE, ESTADO, COMENTARIO)
						VALUES ('$id_proyecto', '3', '$estado_fase0','$comentarios')   ";
						

			mysqli_query($enlace,$sentencia2);

			header("Location:../fase2/fase2.php");

		?>