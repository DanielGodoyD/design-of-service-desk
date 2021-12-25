<?php


if(isset($_POST["submit"])) {
    $nombres = $_POST["nombre"];
    $apellidos = $_POST["apellido"];
    $n_doc = $_POST["n_doc"];
    $correo = $_POST["correo"];
    

    $id_perfil = $_POST["perfil"];

    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia1 = "INSERT INTO trabajador (NRO_DOC, NOMBRES, APELLIDOS, CORREO) 
            VALUES ( '$n_doc', '$nombres', '$apellidos',  '$correo');";

			mysqli_query($enlace,$sentencia1);
            
            $sentencia2 = "UPDATE users SET 
                            ID_PERFIL = '$id_perfil'
                            WHERE NRO_DOC = '$n_doc' ";

            mysqli_query($enlace,$sentencia2);

			
}	else { echo "algun error";}	

header("Location:../trabajador/trabajador.php");

?>