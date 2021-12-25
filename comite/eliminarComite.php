<?php
			
            
            $id= $_GET["id"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia = "DELETE FROM comite where ID_COMITE='$id';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:../comite/comite.php");			
?>