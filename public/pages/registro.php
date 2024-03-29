<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75..100,300..800&display=swap" rel="stylesheet">
    <title>Registro</title>
</head>

<body class="fondoLogin">
    <section class="formRegistro">
        <h2>Registrate</h2>
        <form class="registro" action="../../actions/registro.php" method="POST">
            <input class="campo" type="text" name="nombre" placeholder="Nombre" required>
            <input class="campo" type="text" name="apellidos" placeholder="Apellidos" required>
            <input class="campo" type="text" name="dni" placeholder="DNI" required>
            <input class="campo" type="email" name="email" placeholder="Email" required>
            <input class="campo" type="password" name="password" placeholder="Contraseña" required>
            <input class="campo" type="password" name="repPass" placeholder="Repite Contraseña" required>
            <p><input type="checkbox" name="tyc" id="tyc">Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
            <input class="btnRegistro" type="submit" value="Registrarse">
            <p class="error"></p>
        </form>

</body>

</html>