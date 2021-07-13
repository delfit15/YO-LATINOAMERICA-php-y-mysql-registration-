<!DOCTYPE html>
<html>
<body>
<?php
 
 //session_start(); 
 include('conexion_db.php');

  $msg = "";
  $msg_class = "";

  if (isset($_POST['enviar'])) {
    // for the database
      $bio = stripslashes($_POST['bio']);
      $nombre_imagen =  $_FILES["imagen"]["name"];
    //  time() . '-' .

    // For image upload
    $target_dir = "fotos/";
    $target_file = $target_dir . basename($nombre_imagen);
    // VALIDATION

    // validate image size. Size is calculated in Bytes
    if ((($_FILES["imagen"]["type"] == "image/gif")
     //si es un jpg
    || ($_FILES["imagen"]["type"] == "image/jpeg")
     //o si es un pjpeg
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

      if(file_exists("fotos/" . $_FILES["imagen"]["name"])) {
        echo "El archivo ya existe";
      
      }

      else
      {//sino lo mueve
      move_uploaded_file($_FILES["imagen"]["tmp_name"], "fotos/" . $_FILES["imagen"]["name"]);}
      }

  
    
    }


    else
  {
  //y sino me dice que el archivo es invalido, o sea no es una imagen
  echo "Archivo subido invalido, solo imagenes gif,jpeg,png, menor a 20kb";
  }
 
  
?>