
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
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
        <label>Usuario:</label><br /> 
        <input type="text" name="usuario_usuario" maxlength="15" placeholder="Máximo 15 caractéres " title="15 carácteres como máximo sin espacio, sin números" pattern="[a-zA-Z]+" required/><br />
        <label>Contraseña:</label><br />
        <input type="password" name="usuario_clave" maxlength="15"  placeholder="Al menos un nº y letra" required /><br /> 
        <label>Confirmar Contraseña:</label><br />
        <input type="password" name="usuario_clave_conf" maxlength="15"  placeholder="Al menos un nº y letra" required/><br /> 
        <label>Nombre:</label><br /> 
        <input type="text" name="usuario_nombre" maxlength="30" placeholder="Nombre" required/><br /> 
        <label>Apellido:</label><br /> 
        <input type="text" name="usuario_apellido" maxlength="30" placeholder="Apellido" required/><br /> 
        <input type="submit" name="enviar" value="Registrarse" /> 
        <input type="reset" value="Borrar" /> 
    </form> 
	
    <p> <a href="acceso_main.php">Iniciar Sesión</a>  |  <a href="registro.php">Registrarse</a> | <a href="que_es.php">¿Qué es?</a></p>
<?php 
    } 
?>
