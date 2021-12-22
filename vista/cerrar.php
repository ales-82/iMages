<?php

//aqui cierra sesion ya sea usuario o administrador.
session_start();

session_destroy();

header('Location:../index.php');	