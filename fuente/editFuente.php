<?php
			
			$id_fuente= $_POST["id_fuente"];
			
			$nombre_empresa = $_POST["nombre_empresa"];
			$ruc = $_POST["ruc"];
			
			$pais = $_POST["pais"];
			$representante = $_POST["representante"];
			$tipo_documento = $_POST["tipo_documento"];
			$numero_documento = $_POST["numero_documento"];
			$correo = $_POST["correo"];
			$estado = $_POST["estado"];
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "UPDATE fuente_financiera set 
						  NOMBRE_EMPRESA = '$nombre_empresa',
						  RUC= '$ruc',
						  PAIS= '$pais',
						  REPRESENTANTE= '$representante',
						  TIPO_DOCUMENTO ='$tipo_documento',						  
						  NUMERO_DOCUMENTO ='$numero_documento',
						CORREO ='$correo',
						ESTADO ='$estado'
						  where ID_FUENTE_FINANCIERA='$id_fuente';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:fuente.php");			
		?>