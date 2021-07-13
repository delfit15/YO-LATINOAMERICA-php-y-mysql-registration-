
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>


<?php
    //Cambiando la contraseña:
    //Con este script, los usuarios podrán cambiar su contraseña.
    
    
    session_start();
    include('conexion_db.php'); // inclu�mos los datos de conexi�n a la BD 
    include_once('procesar_imagenes.php') ;
    if(isset($_SESSION['usuario_usuario'])) { // comprobamos que la sesi�n est� iniciada
       
if(isset($_POST['enviar'])) { 

                    if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) { 
                echo "Las password ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
            }
            else { 

                $usuario_clave = $_POST["usuario_clave"];
                $usuario_clave = md5($usuario_clave); // encriptamos la nueva contrasena con md5 

                //$usuario_usuario= $_POST["usuario_usuario"];
                $usuario_nombre=  $_POST["usuario_nombre"];
                $usuario_apellido=  $_POST["usuario_apellido"]; 
                $usuario_usuario = $_SESSION["usuario_usuario"];

                $bio = stripslashes($_POST['bio']);
                $nombre_imagen =  $_FILES["imagen"]["name"];

                $target_dir = "fotos/";
                $target_file = $target_dir . basename($nombre_imagen);

             //   move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
                $sql = "UPDATE usuarios SET clave='".$usuario_clave."', nombre='".$usuario_nombre."',apellido='".$usuario_apellido."', imagen= '$nombre_imagen', bio= '$bio' WHERE usuario='".$usuario_usuario."' ";
                $result = $conn->query($sql);
                
                if($result) {
                    ?>
                    
                    	<script type="text/javascript">
 							window.location="perfiles.php"
 						</script>
                    <?php
                }else { 
                    echo "Error: No se pudo actualizar el perfil. <a href='javascript:history.back();'>Reintentar</a>";
                } 
            } 
        }else { 
            
            $usuario_nombre=  $_SESSION["usuario_nombre"];
            $usuario_apellido=  $_SESSION["usuario_apellido"]; 

            $q= "SELECT * FROM usuarios where usuario='$_SESSION[usuario_usuario]' ;";
            $resulta=$conn->query($q);
		    $row=mysqli_fetch_assoc($resulta);

            $bio=  $row['bio']; 
?> 

  <h1>Editar Perfil</h1><br/>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype= "multipart/form-data"> 

        <label><h4><b> Subir Foto de Perfil </b></h4></label>
        <div class="form-group text-center" style="position: relative;" ><span class="img-div">
        <div class="text-center img-placeholder"  onClick="triggerClick()">
        </div>
              <img src= "<?php echo 'fotos/' . $row['imagen']?>" onClick="triggerClick()" id="profileDisplay">
            </span>
           <input type="file" name="imagen" onChange="displayImage(this)" id="imagen" class="form-control" style="display: none;" 
           value="<?php echo $imagen ?>"
           >

         </div>

        
            <label><h4><b>Bio</b></h4></label>
            <input class="form-control" type="text" name="bio"  value="<?php echo $bio ?>"> <br/> 
            
            v
           <label><h4><b> Nombre </b></h4></label>
           <input class="form-control" type="text" name="usuario_nombre" value="<?php echo $usuario_nombre ?>">

            <label><h4><b>Apellido</b></h4></label>
            <input class="form-control" type="text" name="usuario_apellido" value="<?php echo $usuario_apellido ?>">

            <label><h4><b>Nuevo Password:</b></h4></label><br/>
            <input type="password" name="usuario_clave" maxlength="15" /><br /> 

            <label><h4><b>Confirmar Password:</b></h4></label><br /> 
            <input type="password" name="usuario_clave_conf" maxlength="15" /><br /> 


            <button type="submit" name="enviar" value="enviar" class="btn btn-primary btn-block">Guardar Cambios</button>
         </form> 
        
<?php 

//<input type="submit" name="enviar" value="enviar" />

       } 
    }
    else { 
        echo "Acceso denegado."; 
   } 
?>
</body>
</html>
<script src="script.js"></script>
