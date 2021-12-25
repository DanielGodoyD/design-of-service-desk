<?php

			$id_usuario= $_POST["id_usuario"];
			
			$tipo_de_documento = $_POST["tipo_doc"];
			$id_perfil= $_POST["id_perfil"];
			
			$fecha_de_nacimiento= $_POST["fecha"];
			$password = $_POST["pass"];
			$estado = $_POST["estado"];
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contrase�a BD, nombre BD*/
			       $enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualizaci�n - UPDATE*/
			       
			       $sentencia = "UPDATE `users` set 
						  NRO_DOC= '$id_usuario',
						  TIPO_DOC= '$tipo_de_documento',
						 
						  ID_PERFIL = '$id_perfil',
						  CUMPLEAÑOS='$fecha_de_nacimiento',						  
						  PASSWORD ='$password',
						  ESTADO ='$estado'
						  where NRO_DOC='$id_usuario';"   ;
			
			       mysqli_query($enlace,$sentencia);
           
			
			header("Location:../usuario/usuario.php");


?>