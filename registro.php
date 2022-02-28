
<?php 
//Formulario de Registro:
    include('conexion_db.php'); // incluimos el archivo de conexión a la Base de Datos 
  
    if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos desde el formulario 

        if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) 
			{ // comprobamos que las contraseñas ingresadas coincidan 
				echo "Contraseña Incorrecta <a href='javascript:history.back();'>Reintentar</a>";
			}
		else 
			{ 
		    // "limpiamos" los campos del formulario de posibles códigos maliciosos  
            $usuario_usuario = $_POST['usuario_usuario']; 
            $usuario_nombre = $_POST['usuario_nombre'];
            $usuario_clave = $_POST['usuario_clave'];
            $usuario_apellido= $_POST['usuario_apellido']; 

			// comprobamos que el usuario ingresado no haya sido registrado antes 
                $sql = "SELECT usuario FROM usuarios WHERE usuario='".$usuario_usuario."'";
                
            $result = $conn->query($sql);
                
            if ($result->num_rows > 0)
            {
					echo "El usuario elegido ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>"; 
            }
			else 
			{ 
			
                $usuario_clave = md5($usuario_clave); // encriptamos la contraseña ingresada con md5 
                //$usuario_clave = base64_encode($usuario_clave); 
				
				// ingresamos los datos a la BD
                
                $reg = "INSERT INTO usuarios (usuario, nombre, apellido, clave, imagen,bio, reg_date) VALUES ('".$usuario_usuario."','" .$usuario_nombre."','" .$usuario_apellido."', '".$usuario_clave."','imagen_default.jpg', 'sin biografía', NOW())";
                if($conn->query($reg) === TRUE)
					{ 
						echo "Datos ingresados correctamente. Ahora puedes loguearte.";
							
					?>
					<html>
					<a href="acceso_main.php">Login</a>
					</html>
					<?php
					}
				else 
					{ 
						echo "ha ocurrido un error y no se registraron los datos."; 
					} 
            } 
        } 
    }else { 
?> 

<html>
<link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <body>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
    <div class="container">
    <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card card-signin my-5">
     <div class="card-body">
    <h5 class="card-title text-center">Registrarse</h5>
    <form class="form-signin">
    <div class="form-label-group">
        <label>Usuario:</label><br><br>
        <input type="text" name="usuario_usuario" class="form-control" maxlength="15" placeholder="Máximo 15 caractéres " title="15 carácteres como máximo sin espacio, sin números" pattern="[a-zA-Z]+" required autofocus/><br />
    </div> 
    <div class="form-label-group">
        <label>Contraseña:</label><br><br>
        <input type="password" name="usuario_clave"  class="form-control" maxlength="15"  placeholder="Al menos un nº y letra" required /><br /> 
    </div>   
    <div class="form-label-group">
        <label>Confirmar Contraseña:</label><br><br>
        <input type="password" name="usuario_clave_conf"  class="form-control" maxlength="15"  placeholder="Al menos un nº y letra" required/><br /> 
    </div>
    <div class="form-label-group">   
        <label>Nombre:</label><br><br> 
        <input type="text" name="usuario_nombre"  class="form-control" maxlength="30" placeholder="Nombre" required/><br /> 
    </div>
    <div class="form-label-group">   
        <label>Apellido:</label><br><br>
        <input type="text" name="usuario_apellido"  class="form-control" maxlength="30" placeholder="Apellido" required/><br /> 
    </div>
        <input type="submit" name="enviar" value="Registrarse"  class="btn btn-lg btn-primary btn-block text-uppercase" /> 
      <!--  <input type="reset" value="Borrar" /> -->
        <hr class="my-4">
              <div class="text-center">
         <a href="acceso_main.php">Iniciar Sesión</a>  |  <a href="registro.php">Registrarse</a> | <a href="que_es.php">¿Qué es?</a>
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
    } 
?>
