<?php
    session_start();  ///Se Especifica cual sesion esta abierta
    session_destroy();  ///Y se cierran todas las credenciales, se elimina la informacion de Cockies
    header("location:index.php")    ///Y se regresa a la pagina principal
?>  
