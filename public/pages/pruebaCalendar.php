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
    <div class="container">
        <div id='calendar'></div>
    </div>

    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="titulo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="formulario">
                    <div class="modal-body">
                        <div class=" form-floating mb-3">
                            <input type="text" class="form-control" id="title">
                            <label for="title" class="form-label">Evento</label>
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="date" class="form-control" id="start">
                            <label for="start" class="form-label">Fecha</label>
                        </div>
                        <div class=" form-floating mb-3">
                            <input type="color" class="form-control" id="color">
                            <label for="color" class="form-label">Fecha</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning">Cancelar</button>
                        <button class="btn btn-danger">Eliminar</button>
                        <button class="btn btn-info" id="btnAccion">Registrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../JS/calendar.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
    <script src='fullcalendar/core/index.global.js'></script> <!-- esto es para el idioma del calendario -->
    <script src='fullcalendar/core/locales/es.global.js'></script><!-- esto es para el idioma del calendario -->
    <script src="<?php echo base_url; ?>../JS/moment.js"></script>
    <script src="<?php echo base_url; ?>../JS/sweetalert2.all.min.js"></script>
</body>

</html>