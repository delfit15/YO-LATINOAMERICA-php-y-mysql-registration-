
<!DOCTYPE html>

<?php 
    //PÁGINA DE INGRESO DEL USUARIO
    session_start(); //inicio sesión (obligatorio)
    include('conexion_db.php'); //incluyo ingreso a base de datos

	// comprobamos que las variables de sesión están vacías 
    if(empty($_SESSION['usuario_usuario'])) 
		{         
			//Una vez que comprobamos que no se esta logueado desde antes, podemos generar el formulario de acceso 
			//Formulario de acceso/login:	
?>

<html>

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <body>

  <form action="comprobar.php" method="post">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar Sesión</h5>
            <form class="form-signin">
              <div class="form-label-group">
              
              <label>Usuario:</label> <br><br>
                 <input type="text" name="usuario_usuario" class="form-control" placeholder="usuario" required autofocus >
              </div>

              <div class="form-label-group">
              <label>Contraseña:</label> <br><br>
            <input type="password" name="usuario_clave" class="form-control" placeholder="clave" required/>
              </div>

              <input type="submit" name="enviar" value="Ingresar"  class="btn btn-lg btn-primary btn-block text-uppercase" />
              <hr class="my-4">
              <div class="text-center">
                  <a class="small"> <p> <a href="acceso_main.php">Iniciar Sesión</a>  |  <a href="registro.php">Registrarse</a> | <a href="que_es.php">¿Qué es?</a></p> </a></div>
              </form>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>  
</html>       

        	
<?php 
  // si es el admin, le muestro opciones de administrador.
    }
    
    else { 


      if($_SESSION['usuario_usuario']==='admin') 
					{
			
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
      <p> Eres administrador/a. <a href="logout.php">Salir</a></p>
        
<?php
// opciones de administrador
						echo "Si quieres eliminar un usuario --> <a href=\"delete_BD.php\">Borrar Usuario</a>";
						echo "<br>";
						echo "Si quieres ver datos de un usuario --> <a href=\"ver_BD.php\">Ver Info de Usuario</a>";
					}
		
    else
					{
           
?>

		<?php 
		//Si está logeado, muestro información restringida solo para los usuarios de nuestro sistema
    include('navbar.html');
		?>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
 </head>
    
  <body>
  <div class="newsletter-subscribe">
  <div class="container">
 
  <div class="intro">
      <h2 class="text-center">Bienvenidx a Soy, Latinoamérica </br><strong><?=$_SESSION['usuario_nombre'].' '.$_SESSION['usuario_apellido']?></strong></h2>
      <p class="text-center"> Galería colaborativa que busca la interpretacion de gente de distintos países de Latinoamérica sobre la canción 
      <a href="https://www.youtube.com/watch?v=DkFJE8ZdeG8" target="_blank">Latinoamerica de Calle 13</a>. Todxs podran realizar un 
      dibujo sobre lo que les transmita, y finalmente poder visualizar todos los dibujos juntos sobre que es Latinoamerica para cada unx de nosotrxs.
      </br></br>
      <a href="restringida_paint.php" class="btn btn-primary " >Empezar</a>
    
      </p>
      
  </div>
  </div>
  </div>

    </body>


<?php 
    } 

  }
?>