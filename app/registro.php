<?php

//Aqui se registraran los mismos usuarios que desean entrar al sistema

include_once "conexion.php";

if(isset($_POST['reg'])){
	if(empty($_POST['user']) || empty($_POST['email']) || empty($_POST['pass'])){
		echo "<p class='btn btn-danger w-100'>Hay campos vacios, porfavor ingrese sus datos!</p>";
	}else{
		//obtener los datos del registro
		$user = trim($_POST['user']);
		$email = trim($_POST['email']);
		$pass = trim($_POST['pass']);	

		$md=md5($pass);

		$default="usuario";

		$reg=registrar($conect, $user, $email, $md,$default);
		
		//me devuelve un boolean true o false
		if($reg)
		{
			header('Location:login.php'); //me redirecciona a la pagina login
			session_start();
			$_SESSION['success'] = "<p class='btn btn-success w-100'>Usuario registrado</p>"; //notifiacion con session
		}else{
			echo "<p class='btn btn-danger w-100'>Ha fallado el registro</p>"; // me queda en la pagina de registro y me notifica que no pude registrarme
		}

	}
}
 function registrar($conx, $user, $email, $pass,$default)
 {

 	$sql = "INSERT INTO usuario(user, email, password, tipo) VALUES('" . $user . "','" .$email . "','" . $pass . "','" . $default . "')";
 	$result = mysqli_query($conx, $sql);	
 	
 	mysqli_close($conexion);
 	return $result;	
 	
 }