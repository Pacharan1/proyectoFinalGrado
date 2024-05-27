<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Prueba Calendar</title>
</head>

<body>
    <?php
    session_start();
    include('../../controlador/funciones.php');
    include '../../layouts/header.php';

    ?>
    <div class="grid-container">
        <div class="sidebar-actions">
            <a href="pruebaCalendar.php"><img src="../../src/consultar-calendario.png" /></a>
            <a href="messages.php"><img src="../../src/mensaje.png" /></a>
            <a href="upload.php"><img src="../../src/subir-archivo.png" /></a>
        </div>
        <div class='my-calendar' id='calendar'></div>
    </div>

    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="titulo">Clase</h5>
                </div>
                <form id="formulario" action="pruebaCalendar.php" method="post">
                    <div class="modal-body">
                        <div class=" form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title">
                            <label for="title" class="form-label">Evento</label>
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="date" class="form-control" id="fecha" name="fecha">
                            <label for="fecha" class="form-label">Fecha</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="hora" name="hora">
                                <option value="">Selecciona una hora</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option>
                            </select>
                            <label for="hora" class="form-label">Hora</label>
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="color" class="form-control" id="color" name="color">
                            <label for="color" class="form-label">Color</label>
                        </div>
                        <input type="hidden" id="id_alumno" name="id_alumno" value="2" readonly>
                        <input type="hidden" id="id_profesor" name="id_profesor" value="1" readonly>
                        <!-- <input type="hidden" id="id_clases" name="id_clases"> -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning">Cancelar</button>
                        <button class="btn btn-info" id="btnAccion" type="submit" name="registrarEvento">Registrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../JS/calendar.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
    <script src='fullcalendar/core/index.global.js'></script> <!-- esto es para el idioma del calendario -->
    <script src='fullcalendar/core/locales/es.global.js'></script> <!-- esto es para el idioma del calendario -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><!-- esto es para las alertas -->
    <script src="../JS/moment.js"></script>
    <script>
        var clases = <?php echo json_encode($clases); ?>; //listado de eventos
        /*estas siguientes funciones son para que al pulsar el boton registrar en el formulario para reservar una clase,
        salga una ventana indicando que has reservado la clase y se manden los datos por post.
        Tambien se ha añadido una funcion para que al pulsar el boton de eliminar, salga una ventana indicando que has eliminado la clase 
        Si no lo hacia de esta manera, no enviaba los datos por post desde el formulario porque prevalecia esta accion 
        de la ventana emergente a enviar los datos primero*/
        $(document).ready(function() {
            $('#btnAccion').on('click', function(e) {
                e.preventDefault();


                var datos = {
                    title: $('#title').val(),
                    fecha: $('#fecha').val(),
                    hora: $('#hora').val(),
                    color: $('#color').val(),
                    id_alumno: $('#id_alumno').val(),
                    id_profesor: $('#id_profesor').val()
                };

                $.post('../../controlador/funciones.php', datos, function(respuesta) {
                    Swal.fire(
                        '¡Well Done!',
                        'Has reservado tu clase con éxito',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                });
            });
            $(document).on('click', '#btnEliminar', function(e) {
                e.preventDefault();

                // Aquí puedes obtener el valor de id_clases
                var id_clases = $('#id_clases').val();
                var name = 'eliminarEvento';
                console.log(id_clases + '!!');
                console.log(name + '!!');

                $.post('../../controlador/funciones.php', {
                    id_clases: id_clases,
                    eliminarEvento: 'true'
                }, function(response) {
                    console.log(name);
                    Swal.fire(
                        '¡Eliminado!',
                        'Tu elemento ha sido eliminado.',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("Error: ", textStatus, errorThrown);
                });
            });

        });
    </script>



</body>

</html>