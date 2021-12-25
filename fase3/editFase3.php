<?php
			
			$id_proyecto= $_POST["id_proy"];
			$nom_proyecto = $_POST["n_proy"];
			$id_concurso = $_POST["id_conc"];
			$id_proponente = $_POST["id_lider"];
			$nom_lider = $_POST["n_lider"];
			$ap_lider = $_POST["a_lider"];
			$correo = $_POST["correo"];

			$prom1 = $_POST["prom1"];
			$prom2 = $_POST["prom2"];
			$prom3 = $_POST["prom3"];
			$prom4 = $_POST["prom4"];
			$prom5 = $_POST["prom5"];
		
            $p_total = ($prom1+$prom2+$prom3+$prom4+$prom5)/5  ;
           
			$comentarios= $_POST["comment"];
			$estado_fase0 = $_POST["est_fase0"];

			/* creación de array */

			$valores = array($prom1, $prom2, $prom3, $prom4, $prom5);
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de INSERTAR */
			
			for( $j=0; $j <= 4; $j++){
				$cri = $j+14;
				$sentencia1 = "INSERT INTO evaluacion (ID_CRITERIO, ID_PROYECTO, ID_FASE, PUNTAJE) 
						VALUES ('$cri', '$id_proyecto', '4', '$valores[$j]');   ";

					mysqli_query($enlace,$sentencia1);		
			}
				
			
			$sentencia2 ="INSERT INTO  eva_fase (ID_PROYECTO, ID_FASE, ESTADO, COMENTARIO, PUNTAJE_TOTAL)
						VALUES ('$id_proyecto', '4', '$estado_fase0','$comentarios', '$p_total')   ";
						

			mysqli_query($enlace,$sentencia2);

			header("Location:../fase3/fase3.php");

		?>