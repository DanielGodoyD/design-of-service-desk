<?php


if(isset($_POST["submit"])) {
    $criterio = $_POST["criterio"];
    $fase = $_POST["fase"];
    $id_fase=$_POST["id_fase"];
   

    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia = "INSERT INTO criterio (NOMBRE_CRITERIO) 
            VALUES ('$criterio',);";
            mysqli_query($enlace,$sentencia);
            $sentencia2 = "UPDATE fase SET 
                            FASE = '$fase' 
                            WHERE id_fase='$id_fase'";

            mysqli_query($enlace,$sentencia2);

			
			
}	else { echo "algun error";}	

header("Location:../criterio/criterio.php");

?>