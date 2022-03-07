<?php

  
    session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
  
    $usuario_id = $_SESSION['usuario_id']; 

    // al terminar el dibujo, lo insertamos en un directorio en el servidor
    define('UPLOAD_DIR', 'dibujos/');
    $img = $_POST['image'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = UPLOAD_DIR . uniqid() . '.png';
    $success = file_put_contents($file, $data);

    // insertamos el dibujo en la base de datos
    $sql = "INSERT INTO dibujos (id_usuario,dibujo,reg_date) VALUES('".$usuario_id."', '".$file."', NOW())";
    $stmt = $conn->prepare($sql) or sendError($conn->error);

    // verificamos si se subió
    if ($stmt->execute()  === TRUE && $success) {
        echo "Dibujo subido con éxito: " . $file;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
?>