<?php


if(isset($_POST["submit"])) {
    
    $tipo = $_POST["nombre"];
    $f_ini = $_POST["f_ini"];
    $f_fin = $_POST["f_fin"];
    $descrip = $_POST["descrip"];
    $estado = $_POST["est"];
       

    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia1 = "INSERT INTO concursos (NOMBRE, F_INI, F_FIN, DESCRIPCION
             ,ESTADO) 
            VALUES ( '$tipo','$f_ini', '$f_fin','$descrip', '$estado');";

			mysqli_query($enlace,$sentencia1);
                   
			
}	else { echo "algun error";}	

header("Location:../concursos/concursos.php");

?>