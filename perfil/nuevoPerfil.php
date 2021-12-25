<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Nuevo Perfil   </h1>



<div class="form1">

			
		<form  action="NewPerfil.php" method="POST">
			
            <table style='margin-left:auto;margin-right:auto;'>
            
			
			<tr><td>Nombre de Nuevo Perfil:</td><td> <input style='width: 290px;' name='nombre' type='text' placeholder='Área X' > </td></tr>
			
			            
         <!--   
            <tr><td>Estado:</td><td>
            
				<input name='est' type='radio' value='ACTIVO'>ACTIVO
				<input name='est' type='radio' value='INACTIVO' checked>INACTIVO
				</td></tr>
        -->	

			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	