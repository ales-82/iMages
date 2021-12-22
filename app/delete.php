<?php

//aqui elimina los usuario que el administrador tiene permiso solamente
include_once "conexion.php";
session_start();
	
if(!isset($_SESSION['nombre'])){
	header('Location:../login.php');				
}

if($_SESSION['tipo'] == 'usuario'){
	header('Location:inicio.php');
}

$id =(int)$_GET['id'];

deleteUsuario($conect, $id);

function deleteUsuario($conx, $id)
{		
	$sql = "DELETE FROM usuario WHERE id = " . $id;

	$result= mysqli_query($conx,$sql);

	if($result){		
		$_SESSION['borrar'] = "<p class='btn btn-danger w-100'>Usuario eliminado</p>";
	}
	
	header("Location: ../vista/dashboard.php");
}