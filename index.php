<?php 
session_start();

require_once "app/conexion.php";

//consulta de dos tablas relacionadas con INNER JOIN
$sql = "SELECT Img.id, Img.nombre, Img.imagen, Usu.user FROM imagenes Img INNER JOIN usuario Usu ON Img.usuario_id = Usu.id ORDER BY Img.id DESC"; 

$resultado = mysqli_query($conect, $sql);

$imagenes=[];
	
while ($fila = mysqli_fetch_assoc($resultado)) {
	 	
 	array_push($imagenes, $fila); 		 	
	 	
}
//echo "<pre>";
//print_r($imagenes);
//echo "</pre>";

//$slide = array_slice($imagenes, 0, 4);

//echo "<pre>";
//print_r($slide);
//echo "</pre>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Arte Colaborativo</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
   <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/main.css">
</head>
<body>	
  <header>
   <nav class="navbar navbar-expand-md bg-light navbar-light py-3">
  <!-- Brand -->
  <div class="container">
    <a class="h2 text-dark text-decoration-none" href="#">iMAGES!</a>  
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto text-dark">
        <li class="nav-item">
          <a class="nav-link font-weight-bold h5" href="index.php">Home</a>
        </li>
    <?php if(!isset($_SESSION['tipo'])){ ?>
        <li class="nav-item">
          <a class="nav-link font-weight-bold h5" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-weight-bold h5" href="Registro.php">Registro</a>
        </li>
     <?php }else{?>
     	<li class="nav-item">
          <a class="nav-link font-weight-bold h5" href="vista/inicio.php"><i class="fa fa-user"></i> <?php echo $_SESSION['nombre'] ?></a>
        </li>
     	<li class="nav-item">
          <a class="nav-link font-weight-bold h5" href="vista/cerrar.php">Salir</a>
        </li>
     <?php }?>
      </ul>
    </div>
  </div> 
</nav>
  </header>

  
  <h3 class="text-center py-3 my-5 w-50 mx-auto border custom-bg">Galeria iMAGE!</h3>
  <div class="gallery-container container">
  	<?php foreach ($imagenes as $key => $value) {
  ?>
	<div class="gallery_item">
      <a href="#"><img src="dist/images/<?php echo $value['imagen'] ?>" alt="" class="gallery_img"></a>
      <h2 class="gallery_title">
        <?php echo $value['nombre']?> <br>
        Subido por: <?php echo $value['user']?>
      </h2>
    </div>  
  <?php		//echo $value['nombre'];
  	} 
  ?>   
  </div>  
<!-- Footer -->
<br>
<footer class="page-footer font-small blue pt-4 text-center text-white"> 

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright: <br>
    <a href="" class="text-white h5">iMages!</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>