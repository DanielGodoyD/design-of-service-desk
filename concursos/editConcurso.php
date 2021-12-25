<?php
			
            $id= $_POST["id"];
            			
			$name = $_POST["name"];
            $f1= $_POST["f_ini"];
            $f2= $_POST["f_fin"];
            $descrip= $_POST["descrip"];
            $estado= $_POST["est"];
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "UPDATE concursos set 
						  NOMBRE = '$name',
                          F_INI = '$f1',
                          F_FIN = '$f2',
                          DESCRIPCION = '$descrip',
                          ESTADO = '$estado'
						  
						  where ID_CONCURSO ='$id';";
			
			mysqli_query($enlace,$sentencia1);
						
			header("Location:../concursos/concursos.php");

		?>