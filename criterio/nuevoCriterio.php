<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Nuevo </h1>



<div class="form1">

			
		<form  action="newCriterio.php" method="POST">
			
			<table style='margin-left:auto;margin-right:auto;'>
			
			<tr><td>Criterio:</td><td> <input style='width: 290px;' name='criterio' type='text' placeholder='Criterio1' > </td></tr>
			<tr><td>Fase:</td><td> <input style='width: 290px;' name='fase' type='text' placeholder='fase2'></td></tr>
		
			
			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	

</html>