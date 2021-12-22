<?php
$title="inicio";
include_once "../section/header.php";

require_once '../app/datos.php';

$datos=obtenerDatos($conect,$_SESSION['id']);
?>
 <div class="col-md-12 w-75 mx-auto my-5 font-weight-bold">
              <?php echo "<h1 class='text-center mb-2'>Hola " . $_SESSION['nombre'] . "</h1>"; ?>
              <input type="hidden" value="<?php echo $datos['id'] ?>">                        
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Sus datos</h4>                  
                </div>                
                <div class="card-body">                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <p class="bmd-label-floating">Nombres: <?php echo $datos['nombres'] ?></p>                          
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <p class="bmd-label-floating">Apellidos: <?php echo $datos['apellidos'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <p class="bmd-label-floating">Dirección: <?php echo $datos['direccion'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <p class="bmd-label-floating">Ciudad: <?php echo $datos['ciudad'] ?></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <p class="bmd-label-floating">Telefono: <?php echo $datos['Telefono'] ?></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <p class="bmd-label-floating">Codigo Postal: <?php echo $datos['codigoPostal'] ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <p>Descripción</pl>
                          <div class="form-group">
                            <textarea class="form-control" rows="5" disabled><?php echo $datos['descripcion'] ?></textarea>
                          </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="text-right">
                    	<a href="formulario.php" class="btn btn-primary pull-right">Modificar</a>	
                    </div>                    
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
<?php

include_once "../section/footer.php";