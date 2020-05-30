<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="/Proyecto_Final/css/CSS.css">
        <style type="text/css"> </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="css/registro.css">

        <script>
            function recibe() {
                var name = document.forma1.titulo.value;
                var writer = document.forma1.autor.value;
                var descr = document.forma1.desc.value;
                var mail = document.forma1.correo.value;
                var arch = document.forma1.archivo.value;

                if (name == "" || writer == "" || descr == "" || mail == "" ||arch == "") {
                    alert("Datos Incompletos")
                    return false;
                } else
                    return true;

            }

            $(document).ready(function () {
                $("#boton").on('click', function () {
                    if (recibe()) {
                        var form = $('#forma1')[0];
                        var data = new FormData(form);

                        $.ajax({
                            url: 'creaProyecto.php',
                            type: 'POST',
                            dataType: 'text',
                            data: data,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (res) {
                                if (res == 0) {
                                    alert('0');
                                } else {
                                    //alert('1');
                                    location.href = "proyectos.php";
                                }
                            }
                        });
                    } ///Termina if confirm ()

                });
            });
        </script>
    </head>

    <body>

        <center>
            <h1 class="titulo my-5">Publicar proyecto</h1>        
        </center>
        
        <div class="container">
                <div class="abs-center">
                    <form id="forma1" name="forma1" action="validafoto.php" enctype="multipart/form-data" class="form mb-3">
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Titulo</label>
                        <div class="col-md-10">
                            <input id="campo1" type="text" name="titulo" placeholder="Escribe nombre del proyecto" class="form-control">
                        </div>
                    </div>

                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Autor</label>
                        <div class="col-md-10">
                        <input id="campo2" type="text" name="autor" class="form-control">                         
                        </div>
                    </div>

                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Descripción</label>
                        <div class="col-md-10">
                            <input id="campo3" type="" name="desc" class="form-control">
                        </div>
                    </div>

                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Correo</label>
                        <div class="col-md-10">
                            <input id="campo4" type="text" name="correo" class="form-control">                        
                        </div>
                    </div>
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Archivo</label>
                        <div class="col-md-10">
                            <input type="file" id="archivo" name="archivo" required class="form-control-file">
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

        <?php
            if (isset($_SESSION['user'])) {                               
                echo "<h3>Logueado como: ".$_SESSION['user']."</h3>";
                }
            ?>
             <center>
                <a class="btn btn-outline-danger" href="publicaciones.php">Regresar</a>
            </center>
    </body>

    </html>
