<?php


if(isset($_POST["submit"])) {
    
    $tipo = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $estado = $_POST["est"];
       

    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia1 = "INSERT INTO comite (TIPO, FECHA_CRE, ESTADO) 
            VALUES ( '$tipo','$fecha', '$estado');";

			mysqli_query($enlace,$sentencia1);
                   
			
}	else { echo "algun error";}	

header("Location:../comite/comite.php");

?>