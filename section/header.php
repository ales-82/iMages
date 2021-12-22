<?php 
session_start();

//comprabamos si inicio sesion, si no lo hizo, deber loguearse
if(!isset($_SESSION['nombre'])){
	header('Location:../login.php');				
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../dist/css/style-dash.css">
	<title><?php echo $title ?></title>
	<style>
		body{
			background-color: #ccc !important;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="<?php echo $acceso = $_SESSION['tipo']=='admin'? 'dashboard.php' : 'inicio.php' ?>">Arte Colaborativo</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>		
  		<div class="collapse navbar-collapse" id="navbarSupportedContent">  			
		    <ul class="navbar-nav ml-auto">
		    <?php if($_SESSION['tipo']=='admin'){?>
		      <li class="nav-item active">
		        	<a class="nav-link" href="dashboard.php">Usuarios<span class="sr-only">(current)</span></a>
		      	</li>	
		      	<li class="nav-item active dropdown">
		        	<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          				<?php echo $result = $_SESSION['tipo'] ==='admin' ? 'Administrador' : '';?>          					
          			</a>
        			<div class="dropdown-menu w-25">
          				<a class="dropdown-item danger" href="cerrar.php">Cerrar Sesión</a>
          			</div>          			
          		</li>   
		  	<?php }else{?>	
          		<li class="nav-item active">
		        <a class="nav-link" href="inicio.php">Perfil <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="archivos.php">Portfolio</a>
		      </li> 
		      <li class="nav-item">
          			<a class="nav-link btn btn-danger btn-sm text-white" href="cerrar.php">Cerrar Sesión</a>
          		</li> 
		      <?php }?>      		
		    </ul>
		</div>
	</div>
  

  
</nav>	
