<?php
			
            $id_vin= $_POST["id_vin"];
            $id_con= $_POST["id_con"];
            $id_com= $_POST["id_com"];
            $id_tra= $_POST["id_tra"];
									
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "UPDATE `miembro/comite/concurso` set 
						  ID_CONCURSO = '$id_con', 
                          ID_COMITE = '$id_com', 
                          ID_TRABAJADOR = '$id_tra'
						  

                          where ID_VINCULO ='$id_vin';
                          
                          ";
			
			mysqli_query($enlace,$sentencia1);
			
			

			header("Location:../vincularComite/vincularComite.php");

?>