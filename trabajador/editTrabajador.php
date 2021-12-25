<?php
			
			$id_trab= $_POST["id_trab"];
			$name = $_POST["name"];
            $lastname = $_POST["lastname"];
            
			$n_doc= $_POST["n_doc"];
            $correo = $_POST["correo"];
            $estado = $_POST["est"];
       
        /* COMO HACER PARA QUE SOLO CAMBIE EL PERFIL SI HE SELECCIONADO ALGO DEL SELECT
          ,SINO QUE SE QUEDE COMO EL PERFIL ACTUAL*/    

        if(isset($_POST['perfil'])) {   
            $perfil= $_POST["perfil"];

            $enlace = mysqli_connect("localhost","root","","ads");

            $sentencia = " UPDATE  users SET
                        ID_PERFIL = '$perfil'
                        WHERE NRO_DOC = '$n_doc'
                         ";

            mysqli_query($enlace,$sentencia);
        } 

			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "UPDATE trabajador set 
						  NOMBRES = '$name',
						  APELLIDOS= '$lastname',						  						
						 
						  CORREO = '$correo'
                          where ID_TRABAJADOR ='$id_trab';

                          ";
			
			mysqli_query($enlace,$sentencia1);
			
			$sentencia2 ="UPDATE users SET
						
						ESTADO ='$estado'
						WHERE NRO_DOC = '$n_doc';
		
			            ";

			mysqli_query($enlace,$sentencia2);

			header("Location:../trabajador/trabajador.php");

		?>