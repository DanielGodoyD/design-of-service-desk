<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Nueva Fuente </h1>



<div class="form1">

			
		<form  action="NewFuente.php" method="POST">
			
			<table style='margin-left:auto;margin-right:auto;'>
			
			<tr><td>Nombres de la empresa:</td><td> <input style='width: 290px;' name='empresa' type='text' placeholder='Company' > </td></tr>
			<tr><td>RUC:</td><td> <input style='width: 290px;' name='ruc' type='text' placeholder='558969575'></td></tr>
			<tr><td>Pais: </td><td><input style='width: 290px;' name='pais' type='text' placeholder='Peru'> </td></tr>
			
			<tr><td>Representante:</td><td> <input style='width: 290px;' name='representante' type='text' placeholder='Julio Campos'> </td></tr>
			<tr><td>Tipo de documento:</td><td> <input style='width: 290px;' name='tipo_documento' type='text' placeholder='DNI'> </td></tr>
			<tr><td>N de documento:</td><td> <input style='width: 290px;' name='n_documento' type='text' placeholder='12345678'> </td></tr>
			<tr><td>Correo:</td><td> <input style='width: 290px;' name='correo' type='text' placeholder='juliocampos@hotmail.com'> </td></tr>
			<tr><td>Estado:</td><td>
            
				<input name='estado' type='radio' value='ACTIVO'>ACTIVO
				<input name='estado' type='radio' value='INACTIVO' checked>INACTIVO
				</td></tr>
			
			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	

</html>