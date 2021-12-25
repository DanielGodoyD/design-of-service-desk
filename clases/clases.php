<?php

	class Usuario{
		private $nroDoc;
		private $tipoDoc;
		private $password;
		private $id_perfil;
		private $estado;
	
		public function __construct(){
			
		}
	
		

	
	}    

	class Perfil{
		/*atributos*/
		private $id_perfil;
		private $perfil;
	
								
		/*métodos*/
		/*Constructor - BOB*/
		public function __construct(){
			
		}

		public function AsignarDatos($id_perfil, $perfil){
			$this->id_perfil = $id_perfil;
			$this->perfil = $perfil;
			
		}

		public function ObtenerPerfiles(){
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 			
			/*Sentencia de consulta - SELECT*/
			$sentencia = "SELECT ID_PERFIL, PERFIL from perfil order by ID_PERFIL;";			
			/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
		
		public function AgregarPerfil(){
			$enlace = mysqli_connect("localhost","root","","ads");
			$sentencia = "INSERT INTO perfil (PERFIL) VALUES ('$this->perfil');";
			mysqli_query($enlace,$sentencia);
		}
		
		public function EliminarPerfil($id_perfil){
			$enlace = mysqli_connect("localhost","root","","ads");
			$sentencia = "DELETE from perfil where ID_PERFIL='$id_perfil';";			
			mysqli_query($enlace,$sentencia);
		}
		
		public function ActualizarPerfil(){
			/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
			$enlace = mysqli_connect("localhost","root","","ads"); 
				
			/*Sentencia de consulta - SELECT*/
			$sentencia = "UPDATE perfil set 
						         PERFIL = '$this->perfil',
								 
								 where ID_PERFIL = '$this->id_perfil';";
			
			mysqli_query($enlace,$sentencia);
		}
		
	}
?>