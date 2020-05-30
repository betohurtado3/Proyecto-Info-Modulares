<?php
    session_start();        ///Se abre una sesion
    
    $estado = false;        ///Y se crea una variable, solamente

    if(isset($_SESSION['user']))    ///Si dentro de nuestra SESSION, hay información de usuario
    {
        $estado = true;         ///Nuestra variable quedara como verdadera, y asi la mandaremos 
        
    }

?>