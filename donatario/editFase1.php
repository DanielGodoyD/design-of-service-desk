<?php
			
			$id_proyecto= $_POST["id_proy"];
			$nom_proyecto = $_POST["n_proy"];
			$id_concurso = $_POST["id_conc"];
			$id_proponente = $_POST["id_lider"];
			$nom_lider = $_POST["n_lider"];
			$ap_lider = $_POST["a_lider"];
			$correo = $_POST["correo"];

			$ins = $_POST["ins"];
			$ins_leg = $_POST["ins_leg"];
			$ap_legal = $_POST["ap_leg"];
			$exp_g = $_POST["gest"];
			$ac_asam = $_POST["ac_asam"];
			$p_list= $_POST["p_list"];
			$no_rec= $_POST["no_rec"];
			$d_sbs= $_POST["d_sbs"];
			$apoyo_ins= $_POST["otra_i"];
			
			$comentarios= $_POST["comment"];
			$estado_fase0 = $_POST["est_fase0"];

			/* creación de array */

			$valores = array($ins, $ins_leg, $exp_g, $ap_legal, $ac_asam, $p_list, 
			$no_rec, $d_sbs, $apoyo_ins);
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de INSERTAR */
			
			for( $j=0; $j <= 8; $j++){
				$cri = $j+1;
				$sentencia1 = "INSERT INTO evaluacion (ID_CRITERIO, ID_PROYECTO, ID_FASE, EVALUACION) 
						VALUES ('$cri', '$id_proyecto', '1', '$valores[$j]');   ";

					mysqli_query($enlace,$sentencia1);		
			}
				
			
			$sentencia2 ="INSERT INTO  eva_fase (ID_PROYECTO, ID_FASE, ESTADO, COMENTARIO)
						VALUES ('$id_proyecto', '1', '$estado_fase0','$comentarios')   ";
						

			mysqli_query($enlace,$sentencia2);

			header("Location:../donatario/fase1.php");

		?>