<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75..100,300..800&display=swap" rel="stylesheet">
  <title>Ace English</title>
</head>

<body>
  <?php include '../../layouts/header.php'; ?>
  <header>
    <section class="presentacion">
      <h1>Welcome to Ace English</h1>
      <h2>Learn English with us</h2>
    </section>
    <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
        <path d="M-0.00,50.10 C150.00,150.33 349.20,-50.10 500.00,50.10 L500.00,150.33 L-0.00,150.33 Z" style="stroke: none; fill: #fff;"></path>
      </svg></div>
    </div>
  </header>

  <section class="sobre-nosotros">
    <div class="contenedor">
      <h2 class="titulo">Mejora la eficiencia con la que aprendes ingles al 200%</h2>
      <div class="sobre-nosotros">
        <img class="img-sobrenosotros" src="../../src/imgSobrenosotros.jpg" alt="">
        <div class="parrafoTexto">
          <h3>¿Que es Ace English?</h3>
          <p>En Ace English, nos esforzamos por ofrecer la mejor experiencia de aprendizaje de inglés posible. Nuestros
            profesores son nativos y tienen años de experiencia en la enseñanza de inglés. Nuestros cursos están diseñados
            para ayudarte a mejorar tus habilidades de comunicación en inglés de manera rápida y eficiente. Ya sea que
            estés buscando mejorar tu inglés para el trabajo, los estudios o simplemente por diversión, tenemos un curso
            que se adapta a tus necesidades. ¡Únete a nosotros hoy y comienza tu viaje hacia la fluidez en inglés!</p>
        </div>
      </div>
    </div>
  </section>

  <section class="niveles">
    <div class="contenedor">
      <h2 class="titulo">Niveles</h2>
      <div class="contenedorNivel">
        <div class="level">
          <img src="../../src/ESTUDIANTE 1.jpg" alt="">
          <h3>Begginer</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, harum!</p>
        </div>
        <div class="level">
          <img src="../../src/ESTUDIANTE 2.jpg" alt="">
          <h3>Begginer</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, harum!</p>
        </div>
        <div class="level">
          <img src="../../src/ESTUDIANTE 3.jpg" alt="">
          <h3>Begginer</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, harum!</p>
        </div>
      </div>
    </div>
  </section>

  <section class="opiniones">
    <div class="contenedor">
      <h2 class="titulo">Que opinan nuestros clientes</h2>
      <div class="cards">
        <div class="tarjeta">
          <img src="../../src/cliente1.jpg" alt="">
          <div class="texto-tarjeta">
            <h4>Estefania Perez</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut egestas metus lectus, vel vehicula sem imperdiet ut. Nullam cursus tempus urna, vitae feugiat massa fringilla ut. Curabitur vitae vulputate risus.</p>
          </div>
        </div>
        <div class="tarjeta">
          <img src="../../src/cliente2.jpg" alt="">
          <div class="texto-tarjeta">
            <h4>Alberto Sanchez</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut egestas metus lectus, vel vehicula sem imperdiet ut. Nullam cursus tempus urna, vitae feugiat massa fringilla ut. Curabitur vitae vulputate risus.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include '../../layouts/footer.php'; ?>
</body>

</html>