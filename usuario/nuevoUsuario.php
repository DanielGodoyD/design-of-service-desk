<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Tabla   </h1>



<div class="form1">

			
		<form  action="newUsuario.php" method="POST">
			
			<table style='margin-left:auto;margin-right:auto;'>
			
			<tr><td>Número de Documento:</td><td> <input style='width: 290px;' name='n_doc' type='number' placeholder='89753245' > </td></tr>
			<tr><td>Tipo de Documento:</td><td> <input style='width: 290px;' name='tipo_doc' type='text' placeholder='DNI'></td></tr>
			<tr><td>ID Perfil: </td><td><input style='width: 290px;' name='id_perfil' type='number' placeholder='1'> </td></tr>
			
			<tr><td>Fecha de Nacimiento:</td><td> <input style='width: 290px;' name='fecha' type='date' > </td></tr>
			<tr><td>Password:</td><td> <input style='width: 290px;' name='pass' type='password' placeholder='12345678'> </td></tr>
			<tr><td>Estado:</td><td>
            
				<input name='estado' type='radio' value='ACTIVO'>ACTIVO
				<input name='estado' type='radio' value='INACTIVO' checked>INACTIVO
				</td></tr>
			
			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	

</html>