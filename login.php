<?php
    $title = 'login';
    include "section/head.php";

    include_once 'app/sesion.php';

    session_start();


    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }

    if(isset($_SESSION['tipo'])){
        if($_SESSION['tipo'] == "admin")
        {
            header('Location:vista/dashboard.php');
        }else{
            if($_SESSION['tipo'] == "usuario")
            {
              header('Location:index.php');  
            }
        }
    }

    

?>
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    INICIAR SESION
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" class="form-control" name="user">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <!--
                                <div class="col-lg-6 login-btm login-text">-->
                                    <!-- Error Message -->
                                <!--</div>-->
                                <div class="col-lg-12 login-btm login-button text-center">
                                    <button type="submit" class="btn btn-outline-primary" name="login">LOGIN</button>
                                </div>
                                <div class="col-lg-12 login-btm login-button text-center">
                                    Si no tenes un usuario porfavor ir a <a href="registro.php" class="text-warning font-weight-bold">REGISTRO</a><br><br>
                                    <a href="index.php" class="btn btn-secondary">Home</a>
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