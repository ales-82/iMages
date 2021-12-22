<?php
$title="Dashboard";
include_once "../section/header.php";
if($_SESSION['tipo'] == 'usuario'){
	header('Location:inicio.php');
}	
include_once "../app/conexion.php";
include_once "../app/datosUsuarios.php";

$u=obtenerUsuarios($conect);

//echo "<pre>";
//print_r($u);
//echo "</pre>";

//notificacion para confirmar la eliminacion de usuario
if(isset($_SESSION['borrar'])){
    echo $_SESSION['borrar'];
    unset($_SESSION['borrar']);
}
mysqli_close($conect);
//notificacion para confirmar la eliminacion de una imagen
if(isset($_SESSION['deleteImg'])){
    echo $_SESSION['deleteImg'];
    unset($_SESSION['deleteImg']);
}

?>

<div class="container">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">º
				<div class="row">
					<div class="col-sm-12">
						<h2>Administrador <b> de Usuarios</b></h2>
					</div>
					<!--<div class="col-sm-6">						
						<a href="<?php //echo 'vistas/registrar.php' ?>" class="mx-5 btn btn-success" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i><span>Add New Employee</span></a>						
					</div>-->
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombres</th>
						<th>Email</th>											
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($u as $row) {
					?>
					<tr>
						<td><?php echo $row['id']?></td>
						<td><?php echo $row['user']?></td>
						<td><?php echo $row['email']?></td>						
						<td>
							<a href="ver.php?id=<?php echo $row['id']?>" class="btn btn-outline-success btn-sm">ver</a>
							<a href="../app/delete.php?id=<?php echo $row['id']?>" class="btn btn-outline-danger btn-sm">eliminar</a>
							
						</td>
					<?php } ?>
					</tr>					
				</tbody>
			</table>			
		</div>
	</div>        
</div>
<?php 
include_once '../section/footer.php';

?>
