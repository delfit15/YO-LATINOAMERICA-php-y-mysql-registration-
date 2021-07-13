
<!DOCTYPE html>

<?php 
    //PÁGINA DE INGRESO DEL USUARIO
    session_start(); //inicio sesión (obligatorio)
    include('conexion_db.php'); //incluyo ingreso a base de datos
    
	// comprobamos que las variables de sesión están vacías 
    if(empty($_SESSION['usuario_usuario'])) 
		{         
			//Una vez que comprobamos que no se esta logueado desde antes, podemos generar el formulario de acceso 
			//Formulario de acceso:	
      //<label for="usuario_clave">Contraseña:</label> <br><br>   <label for="usuario_usuario">Usuario:</label> <br><br>
?>

<html>

    <link rel="stylesheet" type= "text/css" href="estilos.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <body>

  <form action="comprobar.php" method="post">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Soy, Latinoamérica</h5>
            <form class="form-signin">
              <div class="form-label-group">
              
              <label>Usuario:</label> <br><br>
                 <input type="text" name="usuario_usuario" class="form-control" placeholder="usuario" required autofocus >
              </div>

              <div class="form-label-group">
              <label>Contraseña:</label> <br><br>
            <input type="password" name="usuario_clave" class="form-control" placeholder="clave" required/>
              </div>

              <input type="submit" name="enviar" value="Ingresar"  class="btn btn-lg btn-primary btn-block text-uppercase" >
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

        
</body>	

</html>       

        	
<?php 
	//Si un usuario esta previamente logueado, lo saludo y le indico su información
    }
    
    else { 


      if($_SESSION['usuario_usuario']=='admin') 
					{
			
?>
        <p> Eres administrador/a. <a href="logout.php">Salir</a></p>
<?php
						echo "Si quieres eliminar un usuario --> <a href=\"delete_BD.php\">Borrar Usuario</a>";
						echo "<br>";
						echo "Si quieres ver datos de un usuario --> <a href=\"ver_BD.php\">Ver Info de Usuario</a>";
					}
		
    else
					{
?>

  <p> <a href="acceso_main.php">Inicio</a>  |  <a href="perfiles.php">Perfil</a> | <a href="logout.php">Salir</a></p>
        
		<?php 
  
            
		//Muestro información restringida solo para los usuarios de nuestro sistema
		?>
     <p> Bienvenidx a Yo, Latinoamerica <strong><?=$_SESSION['usuario_nombre'].' '.$_SESSION['usuario_apellido']?></strong>   </p>
     <p> Accede a la letra de la canción y selecciona el verso que quieras para empezar a dibujar</p>
		<a href="restringida_letra.php">Empezar</a> 
   


<?php 
    } 

  }
?>



			