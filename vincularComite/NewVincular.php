<?php


if(isset($_POST["submit"])) {
    
    
    $id_con = $_POST["id_con"];
    $id_com = $_POST["id_com"];
    $id_tra = $_POST["id_tra"];
    
       

    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia1 = "INSERT INTO `miembro/comite/concurso` (ID_CONCURSO, 
            ID_COMITE, ID_TRABAJADOR) 
            VALUES ( '$id_con', '$id_com', '$id_tra');";

			mysqli_query($enlace,$sentencia1);
                   
			
}	else { echo "algun error";}	

header("Location:../vincularComite/vincularComite.php");

?>