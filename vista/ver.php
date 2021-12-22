<?php
//
$id=$_GET['id'];
$title="Ver usuario " . $_GET['id'];
include_once "../section/header.php";
if($_SESSION['tipo'] == 'usuario'){
	header('Location:inicio.php');
}	
include_once "../app/datos.php";

$od=obtenerDatos($conect, $id);

//echo "<pre>";
//print_r($od);
//echo "</pre>";

mysqli_close($conect);

?>
<div class="col-md-12 w-75 mx-auto my-5">              
              <input type="hidden" value="<?php echo $od['id'] ?>">                        
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Datos del usuario : <?php  echo $od['user'] ?></h4>                  
                </div>                
                <div class="card-body">                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <p class="bmd-label-floating">Nombres: <?php echo $od['nombres'] ?></p>                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <p class="bmd-label-floating">Apellidos: <?php echo $od['apellidos'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <p class="bmd-label-floating">Dirección: <?php echo $od['direccion'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <p class="bmd-label-floating">Ciudad: <?php echo $od['ciudad'] ?></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <p class="bmd-label-floating">Telefono: <?php echo $od['Telefono'] ?></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <p class="bmd-label-floating">Codigo Postal: <?php echo $od['codigoPostal'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <p>Descripción</pl>
                          <div class="form-group">
                            <textarea class="form-control" rows="5"><?php echo $od['descripcion'] ?></textarea>
                          </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="text-center">
                    	<!--<a href="formulario.php" class="disabled btn btn-primary pull-right">Modificar</a>	-->
                      <a href="archivos.php?id=<?php echo $od['id']?>" class="btn btn-success">Ver su portfolio</a>                
                    </div>                    
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-lg-12 login-btm login-button text-center">
      
                
              </div>
            </div>            
	</div>
<?php

include_once "../section/footer.php";