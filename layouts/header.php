<?php
if (isset($_SESSION['nombre'])) {
  echo '
  <div class="title-login">
    <img src="../../src/logoAce300.png" alt="logoAE" />
    <div class="login">
      <a href="estudiante.php">Hola, ' . $_SESSION['nombre'] . '</a>
      <a href="estudiante.php"
        ><img class="logoUser" src="../../src/usuario.png" alt="logoUser"
      /></a>
      <form action="../pages/logout.php" method="post" style="display: inline;">
      <input type="hidden" name="cerrar_sesion">
      <button class="logout" type="submit">Cerrar sesion</button>
      </form>
    </div>
  </div>

  <div class="navegacion">
    <div class="nav-links">
      <a href="index.php"
        ><img
          src="../../src/home.png"
          alt="btnHome"
          width="40px"
          height="40px"
      /></a>

      <a href="#about">Sobre nosotros</a>

      <a href="services.php">Tarifas</a>

      <a href="blog.php">Blog</a>
    </div>
  </div>
  </div>';
  return;
} else {
  echo '
<div class="title-login">
  <img src="../../src/logoAce300.png" alt="logoAE" />
  <div class="login">
    <a href="login.php">Accede</a>
    <a href="login.php"
      ><img class="logoUser" src="../../src/usuario.png" alt="logoUser"
    /></a>
  </div>
</div>

<div class="navegacion">
  <div class="nav-links">
    <a href="index.php"
      ><img
        src="../../src/home.png"
        alt="btnHome"
        width="40px"
        height="40px"
    /></a>

    <a href="#about">Sobre nosotros</a>

    <a href="services.php">Tarifas</a>

    <a href="blog.php">Blog</a>
  </div>
</div>
</div>';
}
