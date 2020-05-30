    <html>

    <head>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <title>Index</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


        
        <script>
            ///Funcion en JS que realiza la verificacion de los datos al ingresar
            function recibe() { ///Tienen que estar llenos los dos campos del formualario para entrar
                var mail = document.forma1.correo.value;
                var contra = document.forma1.pass.value;
                if (mail == "" || contra == "") {
                    alert("Datos Incompletos")
                    return false;
                } else
                    return true;
            }                       
            $(document).ready(function() {                      ///Una vez que esta listo, por medio de Jquery, con los datos
                $("#boton").on('click', function() {            ///Del formulario los toma al hacer click
                    if (recibe()) {                             ///Y Verificando que la funcion regrese un true
                        var form = $('#forma1')[0];             ///La informacion se introudce en variables
                        var data = new FormData(form);

                        $.ajax({                            ///Y se trabaja con Ajax, el cual nos enviara nuestra informacion
                            url: 'valida.php', ///<- A esa direccion  /// En esta direccion se trabajara con php...
                            type: 'POST',
                            dataType: 'text',
                            data: data,                     ///Todos estos campos se requieren para que la informacion
                            enctype: 'multipart/form-data',  ///Llegue correctamente a nuestro otro archivo
                            processData: false,             ///Y podamos manipularlo en nuestra direccion de destino
                            contentType: false,
                            cache: false,                   ///*******CONTINUA EN LA DIRECCCION URL(VALIDA.PHP)*******
                            success: function(res) {        ///Dependiendo del resultado que nos regrese 
                                if (res == 0) {                 
                                    alert('No existe el registro'); ///Si es 0, nuestro registro no esta en la BD
                                } else {
                                    location.href = "inicio.php";  ///En cambio, si es 1, nos mandara a la pagina de inicio
                                                                    ///Con nuestra session inciada
                                }
                            }
                        });
                    }
                });
            });

        </script>

    </head>

    <body>
        <center>
            <img class="img" src="https://tramiteudg.com/wp-content/uploads/2018/09/logoudgvectores_1_origsdaasss.png">
            <hr>
            <h1 class="titulo">Proyectos Modulares</h1>

            <?php                           ///Esta es una funcion en php, 
                    require("isLogin.php"); ///Que valida si una sesion esta abierta,
                    if($estado){                ///Si hay una sesion abierta, mandara a la pagina principal
                        header('Location: inicio.php'); 
                    }else{
                        ?>           <!--Si no hay ninguna sesion abierta, se abrira el campo para ingresar la informacion-->

            <form class="forma1" id="forma1" name="forma1" action="" method="POST">
                <div class="form-group">
                    <label for="correo">Dirección de correo:</label>
                    <div class="col-md-3">
                        <input type="text" name="correo" class="form-control"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <div class="col-md-3">
                        <input type="password" name="pass" class="form-control">
                    </div>
                </div>
                    
                <p class="center"><input onclick="recibe()" id="boton" class="boton2 btn btn-danger" type="button" value="Iniciar Sesión"></p>
                <?php
                                        
                    }
                                    ///Todo esto se valida dentro del PHP
                    ?>
            </form>
            <hr>
            <div class="mb-5">
                <h3 class="registro">¿Aun no tienes una cuenta?<br>Registrate</h3>
                <a href="formulario.php"><input class="boton2 mt-3 btn btn-danger" type="button" value="Ir a registro"></a>
            </div>
        </center>
    </body>

    </html>
