<?php
$title="Galeria";
include_once "../section/header.php";	
include_once "../app/datos.php";

if($_SESSION['tipo']=='admin'){
	$id=(int)$_GET['id'];	
	$img=obtenerArchivosImg($conect,$id);

		//echo count($img);
	//print_r($img);

	//var_dump($img);	
	if(empty($img)){
		echo "<div class='row mt-5'>
			<p class='btn btn-danger w-50 mx-auto'>este usuario no tiene portfolio<p>
		</div>";		
	}

}
else
{
	$img=obtenerArchivosImg($conect,$_SESSION['id']);	
}
//notificacion para confirmar la eliminacion de una imagen
if(isset($_SESSION['deleteImg'])){
    echo $_SESSION['deleteImg'];
    unset($_SESSION['deleteImg']);
}

mysqli_close($conect);

?>
<div class="container my-5">
	<div class="row">
		<?php if(empty($img) && $_SESSION['tipo']=='usuario'){ 
			echo "<a href='formulario.php' class='btn btn-danger w-50 mx-auto'>Para subir tus imagenes debes ir a la seccion perfil<a>";				
		}?>
		<?php foreach($img as $key => $value){ 
					//print_r($value);
				//echo $value['nombre'];
			?>

		<div class="col-sm-4 text-center">
			<div class="card mb-2 mr-2 rounded border h-75">
				<h6><?php echo $value['nombre']?></h6>
				<img src="../dist/images/<?php echo $value["imagen"] ?>" alt="imagen.jpg" class="overflow-hidden">
				<a href="../app/eliminarImagen.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
			</div>		
		</div>		
		<?php }?>	
	</div>	
</div>
<?php
include_once "../section/footer.php";