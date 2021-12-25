<?php
			
			$id_prop= $_POST["id_donat"];
			
			$nombres = $_POST["nombre"];
			$apellidos = $_POST["apellido"];
			
			$estado = $_POST["est"];
			$n_doc = $_POST["n_doc"];
			$correo = $_POST["correo"];
			$n_org = $_POST["n_org"];
			$ruc = $_POST["ruc"];
			$correo = $_POST["correo"];
			$telefono = $_POST["tel"];
			$direccion = $_POST["dir"];

			$estado = $_POST["est"];
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "UPDATE proponente set 
						  NOMBRES = '$nombres',
						  APELLIDOS= '$apellidos',
						  NOM_ORG ='$n_org',
						  RUC='$ruc',
						  TELEFONO='$telefono',
						  DIRECCION='$direccion',						 						 					  
						  ID_USUARIO ='$n_doc',
						CORREO ='$correo'
						
						  where ID_PROPONENTE='$id_prop';";
			
			mysqli_query($enlace,$sentencia);

			$sentencia2 = "UPDATE users set 
						ESTADO ='$estado'
						
						  where NRO_DOC='$n_doc';";

			mysqli_query($enlace,$sentencia2);
			
			header("Location:donatario.php");			
		?>