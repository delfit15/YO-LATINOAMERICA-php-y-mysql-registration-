
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

<?php
    
    session_start();
    include('conexion_db.php'); // incluimos los datos de conexión a la BD 
    include ('navbar.html');
    include_once('procesar_imagenes.php') ;
    if(isset($_SESSION['usuario_usuario'])) { // comprobamos que la sesión está iniciada

// Opciones de editar el perfil.
//Cambio de contraseña:
// Si la clave cambiada con la confirmacion no coinciden...
if(isset($_POST['enviar'])) { 

                    if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) { 
                echo "Las password ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
            }
            else { //sino cambiamos la contraseña

                $usuario_clave = $_POST["usuario_clave"];
                $usuario_clave = md5($usuario_clave); // encriptamos la nueva contrasena con md5 

                //si se cambian otros datos, los actualizamos en la bd

                $usuario_nombre=  $_POST["usuario_nombre"];
                $usuario_apellido=  $_POST["usuario_apellido"]; 
                $usuario_usuario = $_SESSION["usuario_usuario"];

                $bio = stripslashes($_POST['bio']);
                $nombre_imagen =  $_FILES["imagen"]["name"];

                $target_dir = "fotos/";
                $target_file = $target_dir . basename($nombre_imagen);

                $sql = "UPDATE usuarios SET clave='".$usuario_clave."', nombre='".$usuario_nombre."',apellido='".$usuario_apellido."', imagen= '$nombre_imagen', bio= '$bio' WHERE usuario='".$usuario_usuario."' ";
                $result = $conn->query($sql);
                
                if($result) { // si no hay errores, me redirecciona al perfil
                    ?>
                    
                    	<script type="text/javascript">
 							window.location="perfiles.php"
 						</script>
                    <?php
                }else { 
                    echo "Error: No se pudo actualizar el perfil. <a href='javascript:history.back();'>Reintentar</a>";
                } 
            } 
}else { // si no se cambian los datos, muestro datos actuales
            
            $usuario_nombre=  $_SESSION["usuario_nombre"];
            $usuario_apellido=  $_SESSION["usuario_apellido"]; 

            $q= "SELECT * FROM usuarios where usuario='$_SESSION[usuario_usuario]' ;";
            $resulta=$conn->query($q);
		    $row=mysqli_fetch_assoc($resulta);

            $bio=  $row['bio']; 

    //form de edicion de perfil:
?> 

<div class="container">
    <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                <div class="card-body">
                <h5 class="card-title text-center">Editar Perfil</h5>

                <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype= "multipart/form-data"> 
                <label> Subir Foto de Perfil </label>
                <div class="form-group text-center" style="position: relative;" ><span class="img-div">
                <div class="text-center img-placeholder"  onClick="triggerClick()">
                </div>
                <div class="avatar">
                    <img class="img-fluid rounded-circle" src= "<?php echo 'fotos/' . $row['imagen']?>" onClick="triggerClick()" id="profileDisplay"  width="200" height="200">
                </div>
                    </span>
                <input type="file" name="imagen" onChange="displayImage(this)" id="imagen" class="form-control" style="display: none;" 
                value="<?php echo $imagen ?> " >
                </div>
                <form class="form-signin">
                <div class="form-label-group">
                    <label>Bio</label> <br><br>
                    <input class="form-control" type="text" name="bio"  value="<?php echo $bio ?>"> <br/> 
                </div>
                <div class="form-label-group">
                <label> Nombre </label> <br><br>
                <input class="form-control" type="text" name="usuario_nombre" value="<?php echo $usuario_nombre ?>">
                </div>
                <div class="form-label-group">
                    <label>Apellido</label> <br><br>
                    <input class="form-control" type="text" name="usuario_apellido" value="<?php echo $usuario_apellido ?>">
                    </div>
                    <div class="form-label-group">
                    <label>Nuevo Password:</label><br/><br>
                    <input  class="form-control" type="password" name="usuario_clave" maxlength="15" /><br /> 
                    </div>
                    <div class="form-label-group">
                    <label>Confirmar Password:</label><br/> <br>
                    <input  class="form-control"type="password" name="usuario_clave_conf" maxlength="15" /><br /> 
                    </div>
                    <div class="form-label-group">
                    <button type="submit" name="enviar" value="enviar" class= "btn btn-lg btn-primary btn-block text-uppercase" >Guardar Cambios</button>
                    </div>
                </form>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php 

       } 
    }
    else { 
        echo "Acceso denegado."; 
   } 
?>
</body>
</html>
<script src="imagenPerfil.js"></script>
