<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login</title>
</head>

<body class="fondoLogin">
  <div class="grid-login">
    <div></div>
    <div class="login-center" background-color="white">
      <form class="formLogin" action="index.html" method="post">
        <img class="logoLog" src="../../src/logotrasparente.png" alt="logoAE" />
        <label>
          <i class="fa-solid fa-user"></i>
          <input type="text" id="user" placeholder="Usuario" />
        </label>
        <label>
          <i class="fa-solid fa-lock"></i>
          <input type="password" id="password" placeholder="Contraseña" />
        </label>
        <button type="submit" id="btnlogin">Acceder</button>
        <a href="#" class="link">¿Olvidaste tu contraseña?</a>
        <a href="registro.php" class="link">Registrate</a>
      </form>
    </div>
    <div></div>
  </div>
</body>

</html>