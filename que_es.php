<!DOCTYPE html>

<?php 
 // pagina con informacion sobre la web
    session_start(); //inicio sesión (obligatorio)
    include('conexion_db.php'); //incluyo ingreso a base de datos
    
    ?>
    		<?php 
		//Muestro información restringida solo para los usuarios de nuestro sistema
		?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>

<header>
  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow ">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="acceso_main.php">Iniciar Sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registro.php">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="que_es.php">¿Qué es?</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>

<body>
    <div class="newsletter-subscribe">
  <div class="container">
  <div class="intro">
      <h2 class="text-center"> ¿Qué es SOY LATINOAMÉRICA?</h2>
      <p class="text-center"> Es una página web colaborativa que busca la interpretacion de gente de distintos países de Latinoamérica sobre la canción 
      <a href="https://www.youtube.com/watch?v=DkFJE8ZdeG8" target="_blank">Latinoamérica de Calle 13</a>. Todxs podran realizar un 
      dibujo sobre lo que les transmita, y finalmente poder visualizar todos los dibujos juntos sobre que es Latinoamérica para cada unx de nosotrxs. </p>
  </div>
    
  </div>
  </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>




    