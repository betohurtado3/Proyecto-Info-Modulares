<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Registro de publicaciones</title>
        <link rel="stylesheet" type="text/css" href="css/registro.css">
        <style type="text/css"> </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        
        <script>
            function recibe() {
                var title = document.forma1.titulo.value;
                var aut = document.forma1.autor.value;
                var desc = document.forma1.descr.value;     ///con js, se valida que los datos esten llenos
                 var mail = document.forma1.correo.value;
                var rol = document.forma1.rol.value;

                if (title == "" || aut == "" || desc == "" || mail == "" || rol == "0") {
                    alert("Debes ingresar todos los datos")
                    return false;
                } else
                    return true;

            }

            $(document).ready(function() {   ///Con jqeury se recibe la iformacion 
                $("#boton").on('click', function() {    
                    if (recibe()) {             
                        var form = $('#forma1')[0]; ///Y si la validacion es correcta
                        var data = new FormData(form); ///la informacion queda dentro de nuevas variables

                        $.ajax({                        ///Que el ajax, mandara 
                            url: 'creaPublicacion.php', ///A esta direccion
                            type: 'POST',
                            dataType: 'text',
                            data: data,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function(res) {        ///Si nuestra operacion fue exitosa
                                if (res == 0) { ///Si obtenemos un 1
                                    alert('');
                                } else {
                                    location.href = "publicaciones.php";    ///regresaremos a nuestra pagina de publicaciones
                                }       ///Siendo asi, que veremos nuestra publicaicon nueva
                            }
                        });
                    } ///Termina if confirm ()

                });
            });

        </script>
       
    </head>

    <body>
            <!--body con el contenido para editar-->
            <?php require("isLogin.php");

            if($estado) 
            {
                
            ?>
            <center>
                <h1 class="titulo my-5">Escribir publicacion</h1>        
            </center>
            <?php if (isset($_SESSION['user'])) {   ///Si en nuestros COokies tienen informacion valida
                
                }

                ?>
                
            <div class="container">
                <div class="abs-center">
                    <form id="forma1" name="forma1" action="creaPublicacion.php" enctype="multipart/form-data" class="form mb-3">
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Titulo</label>
                        <div class="col-md-10">
                            <input id="campo1" type="text" name="titulo" class="form-control">
                        </div>
                    </div>

                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Autor</label>
                        <div class="col-md-10">
                        <input id="campo2" type="text" name="autor" class="form-control" readonly value="
                            <?php if (isset($_SESSION['user'])) {       ///Para tomar los datos del usuario que esta ingresado
                            echo "".$_SESSION['user'];}?>">            <!--tomamos la infromacion de SESSION-->                        
                        </div>
                    </div>

                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Descripción</label>
                        <div class="col-md-10">
                            <input id="campo3" type="text" name="descr"class="form-control">
                        </div>
                    </div>

                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Correo</label>
                        <div class="col-md-10">
                            <input id="campo4" type="text" name="correo" class="form-control" value="
                            <?php if (isset($_SESSION['correo'])) { ///De igual manera se toma la informacion del correo que esta 
                            echo $_SESSION['correo'];}?>" readonly>                        
                        </div>
                    </div>
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Rol</label>
                        <div class="col-md-10">
                        <select name="rol" class="custom-select">
                            <option selected disabled 
                                value="<?php if (isset($_SESSION['rol'])) {     ///se realiza lo msimo con el rol
                                echo $_SESSION['rol'];}?>">
                                    <?php if (isset($_SESSION['rol'])) {
                                    echo $_SESSION['rol'];}?>
                            </option>
                        </select>                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <input id="boton" class="boton btn btn-danger" type="button" value="Enviar">
                         </div>
                    </div>     
                    </form>
                </div>
            </div>
                   
            <br>
            <?php
            }
            else {
                header('location: index.php'); ///SI NO HAY UNA SESION ABIERTA SE REGRESA A LA PAGINA PRINCIPAL
            }

            ?>
            <center>
                <a class="link btn btn-outline-danger" href="publicaciones.php">Regresar</a>
            </center>
            <br>
    </body>
    </html>
