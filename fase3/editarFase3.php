<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Evaluación Fase 3 </h1>

<h2 style="text-align:center; color:red;">Se presiona Grabar 1 sola vez. Si solo se accede para ver los datos, al finalizar regresar con
la opción "Atrás" del navegador</h2>

<div class="form1">
<?php
			$id = $_GET["id"];
			$num = $_GET["num"];
	
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			/* MI BASE DE DATOS SE LLAMA ads  */
			$enlace = mysqli_connect("localhost","root","","ads"); 
			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT P.ID_PROYECTO, NOMBRE_PROY, P.ID_CONCURSO, 
            D.ID_PROPONENTE, NOMBRES, APELLIDOS, CORREO
            FROM proyectos AS P 
            JOIN proponente AS D
            ON P.ID_PROPONENTE = D.ID_PROPONENTE
			where P.ID_PROYECTO='$id';  ";
			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			
			/*La funcion obtiene un registro que esta almancenado en $resultado que es el resultado del query*/
			$fila = mysqli_fetch_row($resultado);

			

			$sentencia2 = "SELECT *
            FROM evaluacion            
			where ID_PROYECTO='$id' AND ID_FASE=4;";

			$resultado2 = mysqli_query($enlace,$sentencia2);
			

			$evals = array();
			for ($j=1; $j <= $num; $j++){				 
			   $fila2 = mysqli_fetch_row($resultado2); 
			   
			   if($fila2){	 
				   /* SE REQUIEREN LOS PUNTAJES*/ 	
			       $evals[]= $fila2[5];
			   } else {
				   $evals[]='Falta evaluar';
			   }	

			} 

				/*FALTA LA OTRA SENTENCIA DE TABLA EVALUACION X FASE */

			$sentencia3 = "SELECT *
            FROM eva_fase            
			where ID_PROYECTO='$id' AND ID_FASE=4;";

			$resultado3 = mysqli_query($enlace,$sentencia3);
			$fila3 = mysqli_fetch_row($resultado3);
			
			if($fila3){
				$estado0= $fila3[3];
                $comentario= $fila3[4];
                $puntaje_total = $fila3[5];
			} else{
                $estado0= 'Falta evaluar';
                $puntaje_total = 'Falta evaluar';				
			}

			$rows=$num*2.75;	
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  id='1' action='editFase3.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Proyecto: </td><td ><input style='width: 290px;' name='id_proy' type='number' value='$fila[0]' readonly></td>
			<td rowspan='7'>Estado de Fase 3:</td><td align='center' rowspan='7'> ";
			if ($estado0=='APROBADO') {
				echo "<input name='est_fase0' type='radio' value='APROBADO' checked>APROBADO <br><br>";
				echo "<input name='est_fase0' type='radio' value='APROBADO SUJETO A AJUSTES'>APROBADO SUJETO A AJUSTES <br><br>";
				echo "<input name='est_fase0' type='radio' value='DESAPROBADO'>DESAPROBADO ";
				
			}
			elseif ($estado0=='APROBADO SUJETO A AJUSTES') {
				echo "<input name='est_fase0' type='radio' value='APROBADO'>APROBADO <br><br>";
				echo "<input name='est_fase0' type='radio' value='APROBADO SUJETO A AJUSTES' checked>APROBADO SUJETO A AJUSTES <br><br> ";
				echo "<input name='est_fase0' type='radio' value='DESAPROBADO' >DESAPROBADO </td></tr>";
			} else {
				echo "<input name='est_fase0' type='radio' value='APROBADO'>APROBADO <br><br>";
				echo "<input name='est_fase0' type='radio' value='APROBADO SUJETO A AJUSTES'>APROBADO SUJETO A AJUSTES <br><br> ";
				echo "<input name='est_fase0' type='radio' value='DESAPROBADO' checked>DESAPROBADO </td></tr>";
			}
			
			echo "</td></tr> ";



			echo "<tr><td >Nombre Proyecto: </td><td ><input style='width: 290px;' name='n_proy' type='text' value='$fila[1]'readonly ></td></tr> ";
			echo "<tr><td >ID Concurso:</td><td > <input style='width: 290px;' name='id_conc' type='number' value='$fila[2]'readonly> </td></tr>";
			echo "<tr><td >ID Proponente: </td><td ><input style='width: 290px;' name='id_lider' type='number' value='$fila[3]'readonly></td></tr> ";
			
			echo "<tr><td >Nombres Lider:</td><td > <input style='width: 290px;' name='n_lider' type='text' value='$fila[4]'readonly></td></tr> ";
			echo "<tr><td >Apellidos Lider:</td><td > <input style='width: 290px;' name='a_lider' type='text' value='$fila[5]'readonly></td></tr> ";
			echo "<tr><td >Correo :</td><td > <input style='width: 290px;' name='correo' type='text' value='$fila[6]'readonly></td></tr> ";
			


			echo "<tr><td >PROMEDIO CRITERIO 1</td>";
			
            if($evals[0]){
                echo "<td align='center'><input style='width: 290px;' name='prom1' type='number' value='$evals[0]' >  </td>";
            } else {
                echo "<td align='center'> Falta Evaluar </td>";
            }
            
            echo "           				
				<td rowspan='$num'>Comentarios: </td>
	
				<td rowspan='$num'><textarea name='comment' form='1' rows='$rows' cols='60' placeholder='Inserte un comentario'>";  
				if($fila3){echo"$comentario"; }  
				echo"</textarea>
				</td>	
                </tr>";
                
            echo "<tr><td >PROMEDIO CRITERIO 2</td>";
			             
                    echo "<td align='center'><input style='width: 290px;' name='prom2' type='number' value='$evals[1]' >    </td>";
                                   
            echo "</tr>";

            echo "<tr><td >PROMEDIO CRITERIO 3</td>";
           
                echo "<td align='center'><input style='width: 290px;' name='prom3' type='number' value='$evals[2]' >   </td>";
                                 
            echo "</tr>";

            echo "<tr><td >PROMEDIO CRITERIO 4</td>";
           
                echo "<td align='center'><input style='width: 290px;' name='prom4' type='number' value='$evals[3]' >   </td>";
                               
            echo "</tr>";

            echo "<tr><td >PROMEDIO CRITERIO 5</td>";
         
                echo "<td align='center'> <input style='width: 290px;' name='prom5' type='number' value='$evals[4]' >  </td>";
                             
             echo "</tr>";
                    

            echo "<tr><td > Puntaje Total:</td> 		   			
            <td colspan='3'><input style='width: 290px; ' name='total' type='text' value='$puntaje_total' placeholder= '20'>  </td>
			";
			/*echo "                     
            <td>MIEMBROS DE COMITE </td><td > Evaluación por Miembro (Desde el primero hasta el último criterio) </td></tr>
            
            <tr><td>CTE 1</td><td ><input style='width: 290px; ' name='arr1' type='text' value='' placeholder= '20, 20, 20, 20, 20 '>  </td></tr>
            <tr><td>CTE 2</td><td ><input style='width: 290px;' name='arr2' type='text' value='' placeholder= '20, 20, 20, 20, 20 '> </td></tr>
            <tr><td>CTE 3</td><td ><input style='width: 290px;' name='arr3' type='text' value='' placeholder= '20, 20, 20, 20, 20 '> </td></tr>
            <tr><td>CTE 4</td><td ><input style='width: 290px;' name='arr4' type='text' value='' placeholder= '20, 20, 20, 20, 20 '> </td></tr>
            <tr><td>CTE 5</td><td ><input style='width: 290px;' name='arr5' type='text' value='' placeholder= '20, 20, 20, 20, 20 '> </td></tr>
            <tr><td>CTE 6</td><td ><input style='width: 290px;' name='arr6' type='text' value='' placeholder= '20, 20, 20, 20, 20 '> </td></tr>
                                                         
            ";*/
			
          			
			
			echo "<tr><td align='center' colspan='4'><input type='submit' value='Grabar'> </td></tr> ";
				
			echo "</form>
			</table>	";
	
		?>
</div>	


</html>