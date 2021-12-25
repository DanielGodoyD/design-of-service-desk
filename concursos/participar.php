<?php

/* PARA NO REPETIR CODIGO*/
        include("../header_prop.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Participar de un Concurso  </h1>


<div class="form1">
<?php
			

			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  action='editParticipar.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Concurso: </td><td><input style='width: 290px;' name='id_con' type='number' placeholder='7'></td></tr> ";
			echo "<tr><td >ID Proponente: </td><td><input style='width: 290px;' name='id_prop' type='number'  placeholder='7'></td></tr> ";
            echo "<tr><td >Nombre del Proyecto: </td><td><input style='width: 290px;' name='n_proy' type='text' placeholder='Salvemos el Amazonas' ></td></tr> ";
            

                     
            echo "<tr><td align='center' colspan='2'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	