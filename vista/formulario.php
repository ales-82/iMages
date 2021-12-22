<?php
$title="Actualización de Datos personales";
include_once "../section/header.php";	
include_once "../app/datos.php";
$query=obtenerDatos($conect,$_SESSION['id']);  
mysqli_close($conect);
?>
 <div class="col-md-12 w-75 mx-auto my-5">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Cargar sus datos</h4>
                  <p class="card-category">Complete el formulario</p>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">                          
                          <input type="hidden" class="form-control" name="id" value="<?php echo $query['id'] ?>">
                        </div>
                    </div>
                  </div>                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres</label>
                          <input type="text" class="form-control" name="nombres" value="<?php echo $query['nombres'] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellidos</label>
                          <input type="text" class="form-control" name="apellidos" value="<?php echo $query['apellidos'] ?>" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input type="text" class="form-control" name="dir" value="<?php echo $query['direccion'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ciudad</label>
                          <input type="text" class="form-control" name="ciudad" value="<?php echo $query['ciudad'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefono</label>
                          <input type="text" class="form-control" name="phone" value="<?php echo $query['Telefono'] ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Codigo Postal</label>
                          <input type="text" class="form-control" name="cp" value="<?php echo $query['codigoPostal'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Descripción</label>
                          <div class="form-group">                            
                            <textarea class="form-control" rows="5" name="descripcion"><?php echo $query['descripcion'] ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 mx-auto">
                        <label for="" class="negrita">Desea agregar archivos?</label>
                        <br>
                        <input type="file" multiple="" class="form-control" name="images[]">
                      </div>                      
                        <!--<div class="text-danger" v-if="image">Campo requerido</div>-->
                    </div>  
                    <div class="text-right mt-5">
                      <button type="submit" class="btn btn-primary pull-right" name="update">Actualizar</button>
                    </div>                    
                    
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
<?php
include_once "../section/footer.php";
//mysqli_close($conect);