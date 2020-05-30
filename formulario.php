<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="css/registro.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <style type="text/css"> </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <script>
            function recibe() {
                var user = document.forma1.nombre.value;                ///Con una Funcion de JS
                var apellidos = document.forma1.apellidos.value;        ///Se validan que todos los campos del formolario 
                var contra = document.forma1.pass.value;                ///Esten llenos
                var mail = document.forma1.correo.value;
                var rol = document.forma1.rol.value;
                var code = document.forma1.codigo.value;
                var carrier = document.forma1.carrera.value;

                if (user == "" || apellidos == "" || contra == "" || mail == "" || rol == "0" || code == "" || carrier == "0") {
                    alert("Debes ingresar todos los datos")
                    return false;
                } else
                    return true;

            }

            $(document).ready(function () {
                $("#boton").on('click', function () {      ///Se utiliza la misma formula
                    if (recibe()) {                         ///Por medio de Jquery, tomar los datos del formulario
                        var form = $('#forma1')[0];          
                        var data = new FormData(form);

                        $.ajax({                        ///Y por medio de Ajax, mandarlos a 
                            url: 'creaUsuario.php',     ///El archivo con el cual se realizara la consulta...
                            type: 'POST',
                            dataType: 'text',
                            data: data,
                            enctype: 'multipart/form-data',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (res) {       ///Si es completado:
                                if (res == 0) {             ///Y el archivo no genera un resultado postivo
                                    alert('');              ///En realidad no hace nada
                                } else {
                                    location.href = "index.php";      ///Si se registra algo, regresaremos a nuestro index
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
            <h1 class="titulo my-5">Registro</h1>            
        </center>
            <!--Formulario de registro-->
            <div class="container">
                <div class="abs-center">
                <form id="forma1" name="forma1" action="creaUsuario.php" enctype="multipart/form-data" class="form mb-3">
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Nombre</label>
                        <div class="col-md-10">
                            <input id="campo1" type="text" name="nombre" placeholder="Escriba tu nombre" class="form-control">
                        </div>
                    </div>
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Apellido</label>
                        <div class="col-md-10">
                            <input id="campo2" type="text" name="apellidos" placeholder="Escribe tu apellido" class="form-control">
                        </div>
                    </div>
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Contraseña</label>
                        <div class="col-md-10">
                        <input id="campo3" type="password" name="pass" class="form-control">
                        </div>
                    </div>
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Correo</label>
                        <div class="col-md-10">
                        <input id="campo4" type="text" name="correo" placeholder="Escribe tu Correo" class="form-control">
                        </div>
                    </div>
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Código</label>
                        <div class="col-md-10">
                            <input id="campo4" type="text" name="codigo" placeholder="Escribe tu código" class="form-control">
                        </div>
                    </div>
                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Rol</label>
                        <div class="col-md-10">
                        <select name="rol" class="custom-select mr-sm-2">
                                <option value="Maestro">Maestro</option>
                                <option value="Alumno">Alumno</option>
                            </select>
                        </div>
                    </div>

                    <div class= "form-group row">
                        <label for="campo1" class="col-md-2 col-form-label">Carrera</label>
                        <div class="col-md-10">
                            <select name="carrera" class="custom-select mr-sm-2">
                                <option value="Computación">Computación</option>
                                <option value="Informatica">Informatica</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input id="boton" class="boton btn btn-danger" type="button" value="Registrarse">
                         </div>
                    </div>
                    
                </form>
            </div>
            <center>
                <a class="link btn btn-outline-danger" href="index.php">Regresar</a>  <!--Boton para regresar-->
            </center>
            </div>
    </body>
</html>