<?php
			
            
            $id_fuente= $_GET["id_fuente"];

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contrase�a BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualizaci�n - UPDATE*/
			$sentencia = "DELETE from fuente_financiera where ID_FUENTE_FINANCIERA='$id_fuente';";
			
			mysqli_query($enlace,$sentencia);
			
			header("Location:fuente.php");			
?>