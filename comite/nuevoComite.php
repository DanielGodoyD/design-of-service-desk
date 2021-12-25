<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Nuevo Comité   </h1>



<div class="form1">

			
		<form  action="NewComite.php" method="POST">
			
            <table style='margin-left:auto;margin-right:auto;'>
            
			
			<tr><td>Tipo:</td><td> <input style='width: 290px;' name='nombre' type='text' placeholder='CTE' > </td></tr>
			<tr><td>Inicio de Operación:</td><td> <input style='width: 290px;' name='fecha' type='date' placeholder='Área X' > </td></tr>
            

            
            <tr><td>Estado:</td><td>
            
				<input name='est' type='radio' value='ACTIVO'>ACTIVO
				<input name='est' type='radio' value='INACTIVO' checked>INACTIVO
				</td></tr>
        	

			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	