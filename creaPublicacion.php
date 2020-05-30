<?php
session_start();        ///Se especifica cual sesion esta abierta
require ("conecta.php");    ///Y se conecta con la base de datos...
///Recibe Variables

$titulo    = $_POST['titulo'];
$autor      = $_SESSION['user'];        ///Las variables que son introducidas en el formulario
$rol        = $_SESSION['rol'];        ///Se introducen a nuevas variables de PHP
$descr       = $_POST['descr'];
$correo     = $_SESSION['correo'];

ini_set('date.timezone','America/Mexico_City'); ///Esta es una funcion que toma la direccion geografica
$time = date('Y-m-d', time());                  ///y en una variable, ingresa la fecha
echo $time;                                     ///En realidad el echo no es funcional, solo para verificar que si se imprime algo
                            

echo $_SESSION['user'];
echo $_POST['descr'];           ///Al igual que estas variables, son pra verificar que los campos no estan vacios
echo $_POST['fecha'];
echo $_SESSION['rol'];
echo $_SESSION['correo'];

//Inserta en DB las variables que se han introducido 
$sql = "INSERT INTO publicaciones VALUES (0,'$titulo','$autor','$rol','$descr','$time','$correo','0')";

$res = mysqli_query($con, $sql); ///Si el resultado de esta consulta es valido se guarda un TRUE
if ($res)   
    echo 1; ///si es true, se manda un 1,
else 
    echo 0; //Si no Se realiza correctamente nuestra peticion, se regresa un 0

?>