<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_prop.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Por favor, ingrese su DNI </h1>

<?php
echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='home_prop.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >Número de Documento: </td><td><input style='width: 290px;' name='n_doc' type='number' placeholder='00112233' ></td></tr> ";
			
		/*	echo "<tr><td >Contraseña: </td><td><input style='width: 290px;' name='pass' type='password' placeholder='Ingrese su contraseña' ></td></tr> ";*/
			
			
           
			echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
            </table>	";
            
?>
