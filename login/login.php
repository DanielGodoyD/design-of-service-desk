<?php

if($_POST) {

    //VALIDAR QUE SE HAN MANDADO DATOS
    $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    if(!$dni || !$password) {
        header('Location: index.html');
        die();
    }

    require("datos_conexion.php");
    $conexion= mysqli_connect($db_host,$db_usuario, $db_contra);
    if(mysqli_connect_errno()) {
        echo "FALLO AL CONECTAR BASE DE DATOS";
        exit();
    }
    
    mysqli_select_db($conexion,$db_nombre) or die ("NO SE ENCUENTRA LA BBDD");
    mysqli_set_charset($conexion,"utf8");

    //Consultar si existe usuario con el dni proporcionado
    $consulta = "SELECT * FROM users WHERE NRO_DOC = '$dni' LIMIT 1";
    $resultado = mysqli_query($conexion, $consulta);


    $consulta2 = "SELECT * FROM users WHERE NRO_DOC = '$dni' ";
    $resultado2 = mysqli_query($conexion, $consulta2);
    $registro2 = mysqli_fetch_row($resultado2);

    //Validar si existe usuario
    if(mysqli_num_rows($resultado) === 0) {
        header('Location: index.html');
        die();
    }

    

    $password2 = $registro2[2];
    $id_perfil = $registro2[5];

    
    
    //validar contraseña
   
    if($password2!=$password) {
        header('Location: index.html');
        die();
    } elseif ($password2==$password & $id_perfil==5) {
        header('Location: ../menu_prop.php');
    }    elseif ($password2==$password & $id_perfil==3) {
            header('Location: ../menu_dige.php');
    }    elseif ($password2==$password & $id_perfil==16) {
        header('Location: ../menu_cti.php');
    }  
    else{

    header('Location: ../menu.php');
    }

} else{
    header('Location: index.html');
}