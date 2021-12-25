<?php


if(isset($_POST["submit"])) {
    $nombres = $_POST["nombre"];
    $apellidos = $_POST["apellido"];
    

    $n_doc = $_POST["n_doc"];
    $correo = $_POST["correo"];
    $estado = $_POST["est"];


    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia = "INSERT INTO proponente (NOMBRES, APELLIDOS,ID_USUARIO, CORREO ) 
            VALUES ('$nombres', '$apellidos', '$n_doc', '$correo');";

            mysqli_query($enlace,$sentencia);
            
            
            $sentencia2 = "UPDATE users SET
                           ESTADO ='$estado' 
            ;";

            mysqli_query($enlace,$sentencia2);
			
}	else { echo "algun error";}	

header("Location:donatario.php");

?>