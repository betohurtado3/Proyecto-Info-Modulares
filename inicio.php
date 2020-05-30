<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/inicio.css">

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <title>Bienvenida</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <style>
            #menu ul{margin:0;padding:0;}
            #menu ul li{display:inline;margin:0 3px;}
            </style>

</head>
<body>
    <center>
       
        <!--Body con todo el contenido -->    
        <?php
                require("isLogin.php"); ///Con un archivo que verifica la autenticacion de una sesion
                if($estado)             ///Verificamos si la sesion esta abierta....
                {                       ///*****VER ISLOGIN.PHP********
                ?>
                
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255, 101, 66);">
                    <a class="navbar-brand mb-0 h1" href="inicio.php">Proyectos Modulares</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="publicaciones.php">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="proyectos.php">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php"><?php
                                if (isset($_SESSION['user'])) {         ///por medio de una una funcion en PHP                      
                                echo "".$_SESSION['user'];             ///se imprime la informacion que esta almacenada
                                }                                     ///dentro de la SESSION ....
                                ?> </a>
                        </li>
                        <li class="nav-item pull-right">
                            <a class="nav-link" href="cerrar.php">Cerrar sesión</a>
                        </li>
                        </ul>
                    </div>
                </nav>

                <?php
                }
            else{
                header('location: index.php'); ///Si no hay una sesion abierta, se regresara al index, haciendo que solamente
                }                              ///se pueda ingresar a esta pagina teninedo una sesion abierta
                ?>
                <h2 class="my-4">Solicitud de registro de proyectos modulares</h4>
                <div class="contanier my-3">
                    <p> El registro de proyectos modulares se hace en el siguiente formulario.</p>
    
                <a href="https://goo.gl/forms/0UoZL8EUh2Ce8iX73">https://goo.gl/forms/0UoZL8EUh2Ce8iX73</a>
    
                <p> Una vez concluido el registro, entregar en la coordinación la copía del documento.</p>
                <br>
                    <a href="http://www.cucei.udg.mx">Página Oficial Cucei</a>

                </div>
                <footer class="">

                    <p>La calidad y diversidad de nuestra oferta académica desde bachillerato hasta posgrados<br> incluyendo el Sistema de Universidad Virtual es motivo de orgullo para toda la Red Universitaria de Jalisco.<br> Conócela y entérate de los requisitos de admisión.</p>
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.3077828965097!2d-103.32714794973793!3d20.65705358613316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b23a9bbba80d%3A0xdacdb7fd592feb90!2sCentro%20Universitario%20de%20Ciencias%20Exactas%20e%20Ingenier%C3%ADas!5e0!3m2!1ses!2smx!4v1589264183802!5m2!1ses!2smx" width="600" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    
                </footer>

        </center>
    </body>
    
</html>