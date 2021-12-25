<?php
			
            
            $id_usuario= $_GET["id_usuario"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contrase�a BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualizaci�n - UPDATE*/
			$sentencia = "DELETE from users where NRO_DOC='$id_usuario';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:../usuario/usuario.php");			
?>