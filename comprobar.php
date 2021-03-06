
<?php 
//Este es el archivo que comprueba los datos ingresados en el formulario de login, lo llamaremos comprobar.php

    session_start(); 
    
    include('conexion_db.php');

    
	if(isset($_POST['enviar'])) { // comprobamos que se hayan enviado los datos del formulario
        // comprobamos que los campos usuarios_nombre y usuario_clave no están vacíos 
        if(empty($_POST['usuario_usuario']) || empty($_POST['usuario_clave'])) { 
            echo "El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
        }
        else { 
                // "limpiamos" los campos del formulario de posibles códigos maliciosos
                $usuario_usuario = $_POST['usuario_usuario'];
                $usuario_clave = $_POST['usuario_clave'];
            
                $usuario_clave = md5($usuario_clave);
            
                // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
                $sql = "SELECT * FROM usuarios WHERE usuario='".$usuario_usuario."' AND clave='".$usuario_clave."'";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0){
                
                    $row = $result->fetch_assoc();
                 
                     $_SESSION['usuario_id'] = $row['id']; // creamos el id, nombre y apellido de la sesion y los asignamos a las rows especificas.
                     $_SESSION['usuario_usuario'] = $row["usuario"]; 
                     $_SESSION['usuario_nombre'] = $row["nombre"]; 
                     $_SESSION['usuario_apellido'] = $row["apellido"]; 
                    
                     header("Location: acceso_main.php");
                    
                }

                else { // si no coinciden los datos
                        ?>
                        El usuario o la contraseña ingresada no son correctas.   <br> <a href="acceso_main.php">Reintentar</a>
                        <?php
                    }
        }
    }
    
    else
    {
        header("Location: acceso_main.php");
    }
    
    
?>
