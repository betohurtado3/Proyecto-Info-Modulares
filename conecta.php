<?php
if(!defined ('HOST')) define('HOST', 'localhost');              ///Se define en donde esta almacenada nuestra BD
if(!defined ('BD')) define('BD', 'webDB');                      ///Se define el nombre de la BD
if(!defined ('USER_BD')) define('USER_BD', 'root');             ///Se toman las credenciales para ingresar
if(!defined ('PASS_BD')) define('PASS_BD', '');

$con = mysqli_connect(HOST,USER_BD,PASS_BD,BD) or die ("Error".mysqli_error($con)); 
///Y se introduce todo dentro de una variable que se utilizara despues para verificar la conexion a la BD
?>

