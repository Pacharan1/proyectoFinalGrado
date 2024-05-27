<?php

//Acceso a la base de datos por PDO
$dsn = 'mysql:host=localhost;dbname=aceenglish';
$username = 'root';
$password = 'sF@94pkgPB,';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header("location: error.php?error=" . urlencode("Error al conectar a la base de datos: " . $e->getMessage()));
    exit;
}


//FUNCIONES
function hashContrasenia($contrasenia)
{
    return password_hash($contrasenia, PASSWORD_BCRYPT);
};


// SENTENCIAS
/* aqui voy a establecer 2 funciones que ejecuten un SELECT y un INSERT en la base de datos */

function login($conexion, $usuario, $contrasena)
{/*preparo la sentencia con un prepare y la ejecuto con un execute, cada registro se hace un fetch asociativo 
    y se almacena en una variable llamada "row". Despues se compara lo que has ingresado con el resultado 
    de la base de datos con la funcion password_verify y si es correcto te muestra el mensaje de bienvenida*/
    try {
        $stm = $conexion->prepare("SELECT * FROM alumno WHERE email = :usuario");
        $stm->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stm->execute();
        if ($stm->rowCount() == 0) {
            header("location: login.php?errorform=false");
        } else {
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            if (password_verify($contrasena, $row['contrasena'])) {

                // Guardar cada campo en una variable
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidos'] = $row['apellidos'];
                $_SESSION['dni'] = $row['dni'];
                $_SESSION['telefono'] = $row['telefono'];
                $_SESSION['email'] = $row['email'];
            } else {
                header("location: login.php?errorform=false");
            }
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
};
// aqui recibimos los datos de login y ejecutamos la funcion definida arriba
if (isset($_POST["iniciarSesion"])) {
    $usuario = $_POST["email"];
    $contrasena = $_POST["password"];
    login($pdo, $usuario, $contrasena);
};

/* la funcion registro recibe los datos y ejecuta el INSERT.
Por seguridad, utiliza la funcion password_hash para encriptar la contraseña que se almacena
despues volvemos a la pagina index con un GET para que ejecute el mensaje en verde de que esta correcto */
function registro($conexion, $nombre, $apellidos, $dni, $telefono, $email, $contrasena1, $contrasena2)
{
    try {
        if (password_verify($contrasena1, $contrasena2)) {

            $stm = $conexion->prepare("INSERT INTO alumno(nombre, apellidos, dni, telefono, email, contrasena) VALUES (:nombre, :apellidos, :dni, :telefono, :email, :contrasena)");
            $stm->bindParam(":nombre", $nombre, PDO::PARAM_STR, 255);
            $stm->bindParam(":apellidos", $apellidos, PDO::PARAM_STR, 255);
            $stm->bindParam(":dni", $dni, PDO::PARAM_STR, 255);
            $stm->bindParam(":telefono", $telefono, PDO::PARAM_INT);
            $stm->bindParam(":email", $email, PDO::PARAM_STR, 255);
            $stm->bindParam(":contrasena", hashContrasenia($contrasena1), PDO::PARAM_STR, 255);
            $stm->execute();
            header("location: login.php?errorform=true");
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}
// aqui recibimos los datos de registro y ejecutamos la funcion definida arriba
if (isset($_POST["registro"])) {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $contrasena1 = $_POST["password"];
    $contrasena2 = $_POST["repPass"];
    registro($pdo, $nombre, $apellidos, $dni, $telefono, $email, $contrasena1, $contrasena2);
}


//FUNCIONES PARA EL CALENDARIO
function registrarEvento($conexion, $title, $color, $fecha, $hora, $id_alumno, $id_profesor)
{
    // Preparar la consulta
    $stm = $conexion->prepare("INSERT INTO clases (title, color, fecha, hora, id_alumno, id_profesor) VALUES (:title, :color, :fecha, :hora, :id_alumno, :id_profesor)");

    // Vincular los parámetros
    $stm->bindParam(':title', $title, PDO::PARAM_STR);
    $stm->bindParam(':color', $color, PDO::PARAM_STR);
    $stm->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stm->bindParam(':hora', $hora, PDO::PARAM_STR);
    $stm->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
    $stm->bindParam(':id_profesor', $id_profesor, PDO::PARAM_INT);

    // Ejecutar la consulta
    $stm->execute();
}


// Comprobar si todos los campos necesarios están presentes
if (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['id_alumno']) && isset($_POST['id_profesor'])) {
    // Recoger los datos del formulario
    $title = $_POST['title'];
    $color = $_POST['color'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $id_alumno = $_POST['id_alumno'];
    $id_profesor = $_POST['id_profesor'];
    registrarEvento($pdo, $title, $color, $fecha, $hora, $id_alumno, $id_profesor);
}



function obtenerClases($pdo) //esta funcion es para obtener las clases de la base de datos y mostrarlas en el calendario
{
    $stm = $pdo->prepare("SELECT * FROM clases");
    $stm->execute();
    $clases = [];
    while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        $fila['id_clases'] = strval($fila['id_clases']);
        $clases[] = $fila;
    }
    return $clases;
}
// aqui ejecutamos la funcion definida arriba para obtener las clases
$clases = obtenerClases($pdo);
//var_dump($clases);


function eliminarClase($conexion, $id_clases)
{
    $stm = $conexion->prepare("DELETE FROM clases WHERE id_clases = :id_clases");
    $stm->bindParam(':id_clases', $id_clases, PDO::PARAM_INT);
    $stm->execute();
}

if (isset($_POST['eliminarEvento'])) {
    $id_clases = $_POST['id_clases'];
    eliminarClase($pdo, $id_clases);
}
