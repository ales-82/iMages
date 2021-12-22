<?php

include "conexion.php";
//include 'validarSesion.php';

if(isset($_POST['login'])){
	if(empty($_POST['user']) || empty($_POST['pass'])){
		echo "<p class='btn btn-danger w-100'>Hay campos vacios, porfavor ingrese sus datos!</p>";
	}else{			
		$nombre=mysqli_real_escape_string($conect,$_POST['user']);
		$pass=mysqli_real_escape_string($conect,$_POST['pass']);				
		$md = md5($pass);
		//llamando a la funcion login linea 29
		$login=login($conect,$nombre,$md);
		//devuelve un boolean false o true		
		if($login){
			//echo "<p class='btn btn-success w-100'>Listo, Ingresaste</p>";
			$sesion = sesionUsuario($login);			
			if($sesion['tipo']==="admin"){
				header('Location:vista/dashboard.php'); //acceso al administrador
			}else{
				header('Location:vista/inicio.php'); //acceso al usuario
			}
		}
		else{
			echo "<p class='btn btn-danger w-100'>Datos Incorrectos</p>";		
		}

	}
}
function login($conexion,$nombre,$pass)
{
	$sql ="select * from usuario where user = '" . $nombre  ."' and password='" . $pass. "'";
	//echo "<br>" . $sql . "<br>";
	$result = mysqli_query($conexion, $sql);
	//echo "<pre>";
	//var_dump($result);
	//echo "</pre>";
	$usuario = mysqli_fetch_assoc($result);

	mysqli_close($conexion);
	return $usuario;
}

function sesionUsuario($login)
{
	session_start();

	$_SESSION['id'] =(int) $login['id'];
	$_SESSION['nombre'] = $login['user'];
	$_SESSION['tipo'] = $login['tipo'];
	
	return $_SESSION;
}