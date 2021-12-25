<?php
			
            $id= $_POST["id"];
            
			$estado = $_POST["est"];
			$tipo = $_POST["tipo"];
			$fecha= $_POST["fecha"];
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "UPDATE comite set 
						  TIPO = '$tipo',
                          FECHA_CRE = '$fecha',
                          ESTADO = '$estado'
						  
						  where ID_COMITE ='$id';";
			
			mysqli_query($enlace,$sentencia1);
			
			

			header("Location:../comite/comite.php");

		?>