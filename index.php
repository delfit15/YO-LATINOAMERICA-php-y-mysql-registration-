<!DOCTYPE html>

<?php 
    //PÁGINA PRINCIPAL DE INICIO
    //con canvas de proccesing incluido
    session_start(); //inicio sesión (obligatorio)
    include('conexion_db.php'); //incluyo ingreso a base de datos
    ?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<head>
		<meta http-equiv="Content-Type" content="text/html" />
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <title>SOY,LATINOAMERICA</title>
	<script   src="processing/p5.js"></script>
  <script src="processing/sketch_p5.js"></script>   
</head> 
<body id='intro-canvas'>
<header>
  <!-- Navigation -->
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
 </body>
</header>

</html>



    