<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Nuevo Trabajador   </h1>



<div class="form1">

			
		<form  action="NewTrabajador.php" method="POST">
			
            <table style='margin-left:auto;margin-right:auto;'>
            
			<tr><td>Número de documento:</td><td> <input style='width: 290px;' name='n_doc' type='number' placeholder='12345678'> </td></tr>
			<tr><td>Nombres:</td><td> <input style='width: 290px;' name='nombre' type='text' placeholder='Juan Diego' > </td></tr>
			<tr><td>Apellidos:</td><td> <input style='width: 290px;' name='apellido' type='text' placeholder='Torres higuain'></td></tr>
			<tr><td>Correo:</td><td> <input style='width: 290px;' name='correo' type='text' placeholder='correo@hotmail.com'> </td></tr>			
			<tr><td>ID Perfil:</td><td> <input style='width: 290px;' name='perfil' type='text' placeholder='1'> </td></tr>
            

         <!--   
            <tr><td>Estado:</td><td>
            
				<input name='est' type='radio' value='ACTIVO'>ACTIVO
				<input name='est' type='radio' value='INACTIVO' checked>INACTIVO
				</td></tr>
        -->	

			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	