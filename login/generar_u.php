<?php

require_once 'funciones.php';

$password;

if(isset($_POST["submit"])){
    $dni= isset($_POST["dni"]) ? $_POST["dni"] : null;
    $name= isset($_POST["nombres"]) ? $_POST["nombres"] : null;
    $last_name= isset($_POST["apellidos"]) ? $_POST["apellidos"] : null;
    $birth= isset($_POST["fecha"]) ? $_POST["fecha"] : null;

    if(!$dni || !$name || !$last_name || !$birth) {
       
        echo "Complete toda la información";
        header('location: index.php');
    }

    $password = generar_pass($birth);
}

require("datos_conexion.php");
$conexion= mysqli_connect($db_host,$db_usuario, $db_contra);
if(mysqli_connect_errno()) {
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
}

mysqli_select_db($conexion,$db_nombre) or die ("NO SE ENCUENTRA LA BBDD");
mysqli_set_charset($conexion,"utf8");

$password_encriptada = password_hash($password, PASSWORD_BCRYPT, [ 'cost' => 12 ]);

$consulta=" INSERT INTO Users (DNI, NOMBRES, APELLIDOS, CUMPLEAÑOS, PASSWORD) VALUES ('$dni','$name','$last_name ','$birth', '$password_encriptada')";
$resultado = mysqli_query($conexion, $consulta);

mysqli_close($conexion);


?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-5">Confirmación de cuenta de usuario</h1>
                    <table class="table  table-hover">
                        <tr>
                            <td><b>Nombre de usuario:</b></td>
                            <td><?= $name . ' ' . $last_name ?></td>
                        </tr>
                        <tr>
                            <td><b>Contraseña:</b></td>
                            <td><?= $password ?></td>
                        </tr>
                        <tr>
                            <td><a href="index.html" class="button">Volver a LOGIN</a> </td>
                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>