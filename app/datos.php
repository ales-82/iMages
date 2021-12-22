<?php

//Aqui se actualizaran los datos de cada usuario, que inicie sesion

include_once "conexion.php";

if(isset($_POST['update'])){		
	if(empty($_POST['nombres']) && empty($_POST['apellidos']) && empty($_POST['dir']) && empty($_POST['ciudad']) && empty($_POST['phone']) && empty($_POST['info']) && $_FILES['images']['error'][0] > 0){
		echo "<p class='btn btn-danger w-100'>Hay campos vacios, porfavor ingrese sus datos!</p>";
	}else{
		$id = (int)$_POST['id'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$direccion = $_POST['dir'];
		$ciudad = $_POST['ciudad'];
		$telefono = $_POST['phone'];
		$cp = $_POST['cp'];
		$descripcion = $_POST['descripcion'];
		$images = $_FILES['images'];				

		$ok=actualizarDatos($conect, $id, $nombres,$apellidos,$direccion, $ciudad, $telefono, $cp, $descripcion, $images);

		//echo "<pre>";		
		//print_r($ok);		
		//echo "</pre>";
		if($ok["actualizar"] || $ok["mover"]){							
			if($ok["mover"]==false){
				echo "<p class='btn btn-warning w-100'>Campos Actualizados, pero ha fallado la carga de imagenes</p>";					
			}else{
				echo "<p class='btn btn-success w-100'>Campos Actualizados, porfavor revise su perfil</p>";
			}			

		}else{
			echo "<p class='btn btn-danger w-100'>No se pudo actualizar sus datos, porfavor consulte con el administrador</p>";
		}

	}	

}

function actualizarDatos($conx, $id, $nombres, $apellidos, $direccion, $ciudad, $telefono, $cp, $descripcion, $imagenes)
{	
	
	$sql = "UPDATE usuario SET nombres = '" . $nombres . "', apellidos = '" . $apellidos . "', direccion = '" . $direccion ."', ciudad = '" . $ciudad . "', telefono = '" . $telefono . "', codigoPostal = '" . $cp . "' , descripcion = '" . $descripcion . "' WHERE id=" . $id;

	$act = mysqli_query($conx, $sql);	

	$dir = substr(dirname(__FILE__),0,-4);

	$errorImg = $imagenes["error"][0]; 	

	$move = subirImagenes($dir, $errorImg, $imagenes);	

	if($move){
		insertarImagenes($conx, $id, $errorImg, $imagenes);	
	}	

	$result = ["actualizar"=>$act,"mover"=>$move];	

	return $result;	
}

function subirImagenes($dir, $error, $imagenes)
{
	$move=false;	
	if($error==0)
	{
		foreach ($imagenes['name'] as $key => $value) {
			//$target = $dir
			$target = $dir . "/dist/images/";

			$targetImg = $target.basename($value);

			foreach ($imagenes['tmp_name'] as $val => $n) {				
				if($key==$val){
					$move = move_uploaded_file($n, $targetImg);
				}
			}
		}
	}
	return $move;
}

function insertarImagenes($conx, $id, $error, $imagenes){
	if($error==0){
		foreach ($imagenes['name'] as $key => $value) {
		
			$nombre = substr($value, 0, -4);						
			$sql = "INSERT into imagenes(nombre, imagen, usuario_id) VALUES('" . $nombre . "','" . $value . "'," . $id . ")";

			$result = mysqli_query($conx, $sql);
		}
	}	
	return $result;	
}

function obtenerDatos($conx, $id)
{

	$sql = "SELECT * FROM usuario WHERE id =" . $id;
	$consulta = mysqli_query($conx, $sql);	

	$datos = mysqli_fetch_assoc($consulta);	
	
	return $datos;
}


//funciones para obtener las imagenes del usuario
function obtenerArchivosImg($conx, $id)
{
	//echo "ya tenes las imagenes";
	$sql = "SELECT * FROM imagenes WHERE usuario_id=" . $id;

	$consulta = mysqli_query($conx, $sql);

	$datos=[];
	
	 while ($fila = mysqli_fetch_assoc($consulta)) {
	 	array_push($datos, $fila);        
    }
    return $datos;
}