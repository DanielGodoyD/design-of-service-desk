<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Nueva Vinculación   </h1>



<div class="form1">

			
		<form  action="NewVincular.php" method="POST">
			
            <table style='margin-left:auto;margin-right:auto;'>
            
			
			<tr><td>ID Concurso:</td><td> <input style='width: 290px;' name='id_con' type='number' placeholder='7' > </td></tr>
			<tr><td>ID Comité:</td><td> <input style='width: 290px;' name='id_com' type='number' placeholder='7' > </td></tr>
			<tr><td>ID Trabajador:</td><td> <input style='width: 290px;' name='id_tra' type='number' placeholder='7' > </td></tr>

            
			<tr><td colspan='2'><input type="submit" name="submit" value='Grabar'> </td></tr>
					
			</form>	
		
</div>	