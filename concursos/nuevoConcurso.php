<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Nuevo Concurso   </h1>



<div class="form1">

			
		<form  action="NewConcurso.php" method="POST">
			
            <table style='margin-left:auto;margin-right:auto;'>
            
			
			<tr><td>Nombre del Concurso:</td><td> <input style='width: 290px;' name='nombre' type='text' placeholder='Concurso A' > </td></tr>
			<tr><td>Fecha de Inicio:</td><td> <input style='width: 290px;' name='f_ini' type='date'  > </td></tr>
            <tr><td>fecha de Finalización:</td><td> <input style='width: 290px;' name='f_fin' type='date'  > </td></tr>
            <tr><td>Descripción:</td><td> <input style='width: 290px;' name='descrip' type='text' placeholder='Este concurso ...' > </td></tr>

            
            <tr><td>Estado:</td><td>
            
				<input name='est' type='radio' value='ACTIVO'>ACTIVO
				<input name='est' type='radio' value='INACTIVO' checked>INACTIVO
				</td></tr>
        	

			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	