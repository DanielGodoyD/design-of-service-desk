<?php

/* PARA NO REPETIR CODIGO*/
        include("../header.html");
    
?>

<head>
    <link rel="stylesheet" href="../css/asdas.css">

</head>

<h1 style="text-align:center;"> Evaluación Fase 0  </h1>

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
			where ID_PROYECTO='$id' AND ID_FASE=1;";

			$resultado2 = mysqli_query($enlace,$sentencia2);
			

			$evals = array();
			for ($j=1; $j <= $num; $j++){				 
			   $fila2 = mysqli_fetch_row($resultado2); 
			   
			   if($fila2){	  	
			       $evals[]= $fila2[4];
			   } else {
				   $evals[]='falta evaluar';
			   }	

			} 

				/*FALTA LA OTRA SENTENCIA DE TABLA EVALUACION X FASE */

			$sentencia3 = "SELECT *
            FROM eva_fase            
			where ID_PROYECTO='$id' AND ID_FASE=1;";

			$resultado3 = mysqli_query($enlace,$sentencia3);
			$fila3 = mysqli_fetch_row($resultado3);
			
			if($fila3){
				$estado0= $fila3[3];
				$comentario= $fila3[4];
			} else{
				$estado0= 'falta evaluar';				
			}

			$rows=$num*2.75;	
			
			/* ENVIAR A ARCHIVO PHP PARA EL UPDATE CON BBDD*/
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<form  id='1' action='editFase1.php' method='POST'>";
			/* USO DE " READONLY "*/
			
			echo "<tr><td >ID Proyecto: </td><td ><input style='width: 290px;' name='id_proy' type='number' value='$fila[0]' readonly></td>
			<td rowspan='7'>Estado de Fase 0:</td><td align='center' rowspan='7'> ";
			if ($estado0=='APROBADO') {
				echo "<input name='est_fase0' type='radio' value='APROBADO' checked> APROBADO <br>";
				echo "<input name='est_fase0' type='radio' value='DESAPROBADO'> DESAPROBADO ";
				
			}
			else {
				echo "<input name='est_fase0' type='radio' value='APROBADO'>APROBADO <br>";
				echo "<input name='est_fase0' type='radio' value='DESAPROBADO' checked>DESAPROBADO </td></tr>";
			}
			
			echo "</td></tr> ";



			echo "<tr><td >Nombre Proyecto: </td><td ><input style='width: 290px;' name='n_proy' type='text' value='$fila[1]'readonly ></td></tr> ";
			echo "<tr><td >ID Concurso:</td><td > <input style='width: 290px;' name='id_conc' type='number' value='$fila[2]'readonly> </td></tr>";
			echo "<tr><td >ID Proponente: </td><td ><input style='width: 290px;' name='id_lider' type='number' value='$fila[3]'readonly></td></tr> ";
			
			echo "<tr><td >Nombres Lider:</td><td > <input style='width: 290px;' name='n_lider' type='text' value='$fila[4]'readonly></td></tr> ";
			echo "<tr><td >Apellidos Lider:</td><td > <input style='width: 290px;' name='a_lider' type='text' value='$fila[5]'readonly></td></tr> ";
			echo "<tr><td >Correo :</td><td > <input style='width: 290px;' name='correo' type='text' value='$fila[6]'readonly></td></tr> ";
			


			echo "<tr><td >¿INSCRITO EN EL SNRP?</td><td align='center'>";
			
			if ($evals[0]=='SI') {
				echo "<input name='ins' type='radio' value='SI' checked>SI";
				echo "<input name='ins' type='radio' value='NO'>NO </td>
				
				<td rowspan='$num'>Comentarios: </td>
	
				<td rowspan='$num'><textarea name='comment' form='1' rows='$rows' cols='60' placeholder='Inserte un comentario'>";  
				if($fila3){echo"$comentario"; }  
				echo"</textarea>
				</td>	
				</tr>";
			} 
			else {
				echo "<input name='ins' type='radio' value='SI'>SI";
				echo "<input name='ins' type='radio' value='NO' checked>NO </td>
				<td rowspan='$num'>Comentarios: </td>
	
				<td rowspan='$num'><textarea name='comment' form='1' rows='$rows' cols='60' placeholder='Inserte un comentario'>";  
				if($fila3){echo"$comentario"; }  
				echo"</textarea>
				</td>
				</tr>";
			}
			
            echo "<tr><td>¿AGENTE LEGAL INSCRITO EN EL SNRP?:</td><td align='center'> ";
            if ($evals[1]=='SI') {
				echo "<input name='ins_leg' type='radio' value='SI' checked>SI";
				echo "<input name='ins_leg' type='radio' value='NO'>NO </td></tr>";
			}
			else {
				echo "<input name='ins_leg' type='radio' value='SI'>SI";
				echo "<input name='ins_leg' type='radio' value='NO' checked>NO </td></tr>";
			}
			
            echo "<tr><td>EXPERIENCIA EN GESTIÓN DE PROYECTOS:</td><td align='center'> ";
            if ($evals[2]=='SI') {
				echo "<input name='gest' type='radio' value='SI' checked>SI";
				echo "<input name='gest' type='radio' value='NO'>NO";
			}
			else {
				echo "<input name='gest' type='radio' value='SI'>SI";
				echo "<input name='gest' type='radio' value='NO' checked>NO </td></tr>";
			}
			
            echo "<tr><td>APROBACIÓN DEL AGENTE LEGAL:</td><td align='center'> ";
            if ($evals[3]=='SI') {
				echo "<input name='ap_leg' type='radio' value='SI' checked>SI";
				echo "<input name='ap_leg' type='radio' value='NO'>NO";
			}
			else {
				echo "<input name='ap_leg' type='radio' value='SI'>SI";
				echo "<input name='ap_leg' type='radio' value='NO' checked>NO </td></tr>";
			}

			echo "<tr><td>PRESENTA ACTA DE ASAMBLEA:</td><td align='center'> ";
            if ($evals[4]=='SI') {
				echo "<input name='ac_asam' type='radio' value='SI' checked>SI";
				echo "<input name='ac_asam' type='radio' value='NO'>NO";
			}
			else {
				echo "<input name='ac_asam' type='radio' value='SI'>SI";
				echo "<input name='ac_asam' type='radio' value='NO' checked>NO </td></tr>";
			}

			echo "<tr><td>PERTENECE A LA LISTA 
			DE MALAS PRÁCTICAS:</td><td align='center'> ";
            if ($evals[5]=='SI') {
				echo "<input name='p_list' type='radio' value='SI' checked>SI";
				echo "<input name='p_list' type='radio' value='NO'>NO";
			}
			else {
				echo "<input name='p_list' type='radio' value='SI'>SI";
				echo "<input name='p_list' type='radio' value='NO' checked>NO </td></tr>";
			}

			echo "<tr><td>IMPEDIDOS DE RECIBIR RECURSOS:</td><td align='center'> ";
            if ($evals[6]=='SI') {
				echo "<input name='no_rec' type='radio' value='SI' checked>SI";
				echo "<input name='no_rec' type='radio' value='NO'>NO";
			}
			else {
				echo "<input name='no_rec' type='radio' value='SI'>SI";
				echo "<input name='no_rec' type='radio' value='NO' checked>NO </td></tr>";
			}

			echo "<tr><td>DEUDOR EN SBS:</td><td align='center'> ";
            if ($evals[7]=='SI') {
				echo "<input name='d_sbs' type='radio' value='SI' checked>SI";
				echo "<input name='d_sbs' type='radio' value='NO'>NO";
			}
			else {
				echo "<input name='d_sbs' type='radio' value='SI'>SI";
				echo "<input name='d_sbs' type='radio' value='NO' checked>NO </td></tr>";
			}

			echo "<tr><td>APOYO DE OTRAS INSTITUCIONES:</td><td align='center'> ";
            if ($evals[8]=='SI') {
				echo "<input name='otra_i' type='radio' value='SI' checked>SI";
				echo "<input name='otra_i' type='radio' value='NO'>NO";
			}
			else {
				echo "<input name='otra_i' type='radio' value='SI'>SI";
				echo "<input name='otra_i' type='radio' value='NO' checked>NO </td></tr>";
			}

			
			
			
			echo "<tr><td align='center' colspan='4'><input type='submit' value='Grabar'> </td></tr>
				";
			echo "</form>
			</table>	";
	
		?>
</div>	

