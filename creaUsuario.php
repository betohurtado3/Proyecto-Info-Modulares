<?php
require "conecta.php";      ///Se enlaza a la BD por medio de nuestro archivo de ingreso
///Recibe Variables

$nombre     = $_POST['nombre'];         /// SE crean variables y se introduce   
$apellidos  = $_POST['apellidos'];      ///Todos los datos de el formualario que llenamos
$pass       = $_POST['pass'];
$correo     = $_POST['correo'];
$rol        = $_POST['rol'];
$carrera    = $_POST['carrera'];
$codigo     = $_POST['codigo'];

$clave_md5 = md5($pass);

//Inserta en DB por medio del comando, y toma las variables que se introdujeron en el formulario
$sql = "INSERT INTO personas VALUES (0,'$nombre','$apellidos','$clave_md5','$rol','$correo','$carrera','$codigo',0)";

$res = mysqli_query($con, $sql);        ///Esta es una variable que obtiene si nuestro comando es valido
    

if ($res)       //Si se realiza un comando, con una validacion correecta
    echo 1;     ///Mandaremos un 1 a nuestro Ajax, 
else 
    echo 0;     //Si el comando no genera nada, se regresa un 0

?>