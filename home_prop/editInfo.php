<?php
			
			$id_prop= $_POST["id_prop"];
            $n_doc = $_POST["n_doc"];
            $name = $_POST["na"];
            $apellidos = $_POST["ap"];
            $n_org = $_POST["n_org"];
            $n_ruc = $_POST["n_ruc"];
            $correo = $_POST["correo"];
            $telefono = $_POST["tel"];
            $direccion = $_POST["dir"];
			
			
			
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de actualización - UPDATE*/
			$sentencia1 = "UPDATE proponente set 
						  NOMBRES ='$name',
                          APELLIDOS ='$apellidos' ,
                          NOM_ORG ='$n_org',
                          RUC ='$n_ruc',
                          CORREO ='$correo',
                          TELEFONO ='$telefono',
                          DIRECCION ='$direccion'
						  
						  where ID_PROPONENTE='$id_prop';";
			
			mysqli_query($enlace,$sentencia1);
			$a = mysqli_query($enlace,$sentencia1);

			header("Location:../home_prop/validar_u.php");

		?>