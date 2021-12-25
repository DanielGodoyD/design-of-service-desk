<?php
			
			$id_consulta= $_POST["id_cons"];
            $id_concurso = $_POST["id_conc"];
            $estado= $_POST["estado"];
            $respuesta = $_POST["rpta"];
			
			
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "UPDATE consultas set 
						  APROBADO_DE = '$estado',
						  RESPUESTA = '$respuesta'

						  where ID_CONSULTA='$id_consulta';";
			
			mysqli_query($enlace,$sentencia1);
			
			

			header("Location:../Consultas/verConsultas.php");

		?>