<?php

//la conexion a base de datos

$conect = mysqli_connect("localhost","root","","sitio");

if(!$conect){
	echo "la conexion ha fallado, por favor contactese con el administrador del sitio";
}

mysqli_set_charset($conect, "utf8");
