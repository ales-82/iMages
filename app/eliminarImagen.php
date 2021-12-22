<?php
//aqui elimina las imagenes del usuario que puede el mismo eliminar o el administrador tambien
include_once "conexion.php";
session_start();
	
if(!isset($_SESSION['nombre'])){
	header('Location:../index.php');				
}

$id =(int)$_GET['id'];
$tipoUsuario = $_SESSION['tipo'];

eliminarImagen($conect, $id, $tipoUsuario);

//funcion sin ningun retorno, solo redirecciona al homre segun el tipo de usuario
function eliminarImagen($conx, $id, $tipoUsuario)
{		
	$sql = "DELETE FROM imagenes WHERE id = " . $id;

	$result= mysqli_query($conx,$sql);

	if($result){		
		$_SESSION['deleteImg'] = "<p class='btn btn-danger w-100'>Imagen Eliminado</p>";
	}

	if($tipoUsuario == "admin"){
		header("Location: ../vista/dashboard.php");	
	}else{
		if($tipoUsuario == "usuario"){
			header("Location: ../vista/archivos.php");	
		}		
	}	
}