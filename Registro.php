<?php

$title="Registro de usuarios";

include_once "section/head.php";

include_once "app/registro.php";
?>

<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    REGISTRO
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="form-control-label">USUARIO</label>
                                <input type="text" class="form-control" name="user">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">EMAIL</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-12 login-btm login-button text-center">
                                    <button type="submit" class="btn btn-outline-primary" name="reg">ENVIAR</button>
                                </div>
                                <div class="col-lg-12 login-btm login-button text-center">
                                    Si ya tenes una usuario ir a <a href="login.php" class="text-warning font-weight-bold">Login</a>
                                </div>
                            </div>          
                        </form>                  
                    </div>
                </div>                
                <div class="col-lg-3 col-md-2">
                </div>                               
            </div>            
        </div>
         <!--<div class="text-center mt-2 mx-auto">
                    <a href="<?php //echo "http://localhost/SitioWebArteColaborativo/index.php"; ?>" class="text-white btn btn-primary">Home</a>
                </div>-->
        
    </div>