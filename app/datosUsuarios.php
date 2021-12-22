<?php

function obtenerUsuarios($conx)
{

	$sql = "SELECT * FROM usuario";

	//$sql = "SELECT id, user, email, tipo FROM usuario";
	
	$consulta = mysqli_query($conx, $sql);

	//print_r($consulta);

	$users=[];
	
	 while ($fila = mysqli_fetch_assoc($consulta)) {

	 	if($fila["tipo"]=="usuario"){
	 		array_push($users, $fila); 	
	 	}
	 	
    }

	return $users;
}

function deleteUsuario($id)
{		
	//header("Location: dashboard.php");
	echo "usuario borrado " . $id;

}