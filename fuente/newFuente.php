<?php


if(isset($_POST["submit"])) {
    $empresa = $_POST["empresa"];
    $ruc = $_POST["ruc"];
    
    $pais = $_POST["pais"];
    $representante = $_POST["representante"];
    $tipo_documento = $_POST["tipo_documento"];
    $n_documento = $_POST["n_documento"];
    $correo = $_POST["correo"];
    $estado = $_POST["estado"];


    //poner archivo de conexion
			$enlace = mysqli_connect("localhost","root","","ads");
            
            if(!$enlace) { echo "error de enlace";};

            $sentencia = "INSERT INTO fuente_financiera (NOMBRE_EMPRESA,RUC, PAIS,
            REPRESENTANTE,TIPO_DOCUMENTO, NUMERO_DOCUMENTO, CORREO, ESTADO ) 
            VALUES ('$empresa', '$ruc', '$pais', 
            '$representante', '$tipo_documento', '$n_documento', '$correo', '$estado');";

			mysqli_query($enlace,$sentencia);
			
			
}	else { echo "algun error";}	

header("Location:fuente.php");

?>