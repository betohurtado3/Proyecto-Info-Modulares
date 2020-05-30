<center>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
       <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/tabla.css">
        <title>Publicaciones</title>
    <script src="js/jquery-3.3.1.min.js"></script>
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
    <!--Body con todo el contenido -->    
        <?php
            require("isLogin.php");
            if($estado)
            {   
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
                <!--Termina el menu-->

                <div class="container my-4">   
                    <h2 class="titulo text-center">Proyectos</h2>
                    <p class="text-center">¿Desea publicar algún proyecto?</p>
                    <div class="abs-center">
                        <a href="formProyecto.php" class="btn btn-danger ml-8">Publicar</a>
                    </div>
                 
                </div>

                <div class="container">
                    <div class="row row-cols-1">
                   

            <?php
            require "conecta.php";
            $sql = "SELECT *
                    FROM proyectos
                    WHERE eliminado = 0
                    ORDER BY id DESC";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);

          for ($i = $num; $objeto = $res->fetch_object() ; $i++)
          {
            ?>

                    <div class="card col m-1 bg-light">
                         <h5 class="card-header"><?= $objeto->titulo ?></h5>
                         <div class="card-body">
                             <div class="row mb-2">
                                 <h5 class="card-title col"><?= $objeto->autor ?></h5>
                             </div>
                                <p class="card-text"><?= $objeto->descripcion ?></p>
                                <a style="btn btn-outline-primary" href="mailto:<?= $objeto->correo ?>">Enviar Correo</a>
                                <br>
                                <a class="btn btn-primary" href="archivos/<?= $objeto->archivo_n ?>" download="Proyecto">Descargar Archivo</a>
                            </div>
                        </div>    
            
        <?php
        }
        ?>
            <br>
            <?php
            }
        else{
             header('location: index.php');
            }
            ?>

         </div>
        </div>
    </body>
    
</html>
    </center>