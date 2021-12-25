<?php
			
            
            $id_donat= $_GET["id_donat"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "DELETE from donatarios where ID='$id_donat';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:donatario.php");			
?>