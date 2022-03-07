
<?php include_once('procesar_imagenes.php') 

//para actualizar la foto del perfil y la bio?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title> Editar Foto y Bio</title>

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>
<body>
  
        <form action="imagen_bio.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>

          <?php endif; ?>

          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="fotos/imagen_default.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="imagen" onChange="displayImage(this)" id="imagen" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          
          <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control"></textarea>
          </div>
          <div class="form-group">

            <button type="submit" name="guardar" value="guardar" class="btn btn-primary btn-block">Guardar Cambios</button>

            
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<script src="imagenPerfil.js"></script>
