<?php
			
            
            $id= $_GET["id_user"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "DELETE FROM users where NRO_DOC='$id';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:../trabajador/trabajador.php");			
?>