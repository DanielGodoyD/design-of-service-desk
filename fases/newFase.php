<?php


if(isset($_POST["submit"])) {
  
    $fase = $_POST["fase"];
  


    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia = "INSERT INTO fase (FASE)
            VALUES ('$fase');";

			mysqli_query($enlace,$sentencia);
			
			
}	else { echo "algun error";}	

header("Location:fases.php");

?>
