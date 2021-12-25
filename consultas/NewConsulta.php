<?php


if(isset($_POST["submit"])) {
    $consulta = $_POST["descrip"];
    $id_con = $_POST["id_con"];
    
       

    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia1 = "INSERT INTO consultas (CONSULTA, ID_CONCURSO) 
            VALUES ( '$consulta', '$id_con') ;";

			mysqli_query($enlace,$sentencia1);
                   
			
}	else { echo "algun error";}	

header("Location:../Consultas/hacerConsultas.php");

?>