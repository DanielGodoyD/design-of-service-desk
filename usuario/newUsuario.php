<?php


   $id_usuario= $_POST["n_doc"];
   $tipo_de_documento = $_POST["tipo_doc"];
   $id_perfil= $_POST["id_perfil"];
   $fecha_de_nacimiento= $_POST["fecha"];
   $password = $_POST["pass"];
   $estado = $_POST["estado"];


    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia = "INSERT INTO users (NRO_DOC, TIPO_DOC, ID_PERFIL,
            CUMPLEAÑOS, PASSWORD, ESTADO ) 
            VALUES ('$id_usuario', '$tipo_de_documento', '$id_perfil', 
            '$fecha_de_nacimiento', '$password', '$estado');";

			mysqli_query($enlace,$sentencia);
			
			
    header("Location:../usuario/usuario.php");

?>