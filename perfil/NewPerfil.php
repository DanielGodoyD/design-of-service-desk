<?php


if(isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    
       

    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia1 = "INSERT INTO perfil (PERFIL) 
            VALUES ( '$nombre');";

			mysqli_query($enlace,$sentencia1);
                   
			
}	else { echo "algun error";}	

header("Location:../perfil/perfil.php");

?>