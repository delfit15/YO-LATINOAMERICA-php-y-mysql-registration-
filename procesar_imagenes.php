<!DOCTYPE html>
<html>
<body>
<?php
 
 //cuando se sube una imagen, procesamos que sean de determinado tamanio o formato para ser aceptados. 
 include('conexion_db.php');

  $msg = "";
  $msg_class = "";

  if (isset($_POST['enviar'])) {
    
      $bio = stripslashes($_POST['bio']);
      $nombre_imagen =  $_FILES["imagen"]["name"];
   

    // tomamos el directorio y el row en la bd
    $target_dir = "fotos/";
    $target_file = $target_dir . basename($nombre_imagen);
   

    // validamos el formato
    if ((($_FILES["imagen"]["type"] == "image/gif")
     //si es un jpg
    || ($_FILES["imagen"]["type"] == "image/jpg")
       //si es un jpeg
    || ($_FILES["imagen"]["type"] == "image/jpeg")
     //o si es un png
    || ($_FILES["imagen"]["type"] == "image/png"))
    //si no sobrepasa los 2 megas
    && ($_FILES['imagen']['size'] > 200000)) {

        //me fijo si hay algun error
         if ($_FILES["file"]["error"] > 0)
         {
         echo "Return Code: " . $_FILES["imagen"]["error"] . "<br />";
         } 
         else { echo "imagen subida con exito";
          }
          // si ya existe, lo informamos
      if(file_exists("fotos/" . $_FILES["imagen"]["name"])) {
        echo "El archivo ya existe";
      
      }

      else
      {//sino lo mueve al directorio
      move_uploaded_file($_FILES["imagen"]["tmp_name"], "fotos/" . $_FILES["imagen"]["name"]);}
      }

  
    
    }


    else
  {
  //y sino me dice que el archivo es invalido, o sea no es una imagen que cumple los requisitos
  echo "Archivo subido invalido, solo imagenes gif,jpeg,png,jpg menor a 20kb";
  }
 
  
?>