<?php
 //Cuando el usuario está registrado puede acceder a ésta página. 
  
    session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
  
    $usuario_id = $_SESSION['usuario_id']; 

    // al terminar el dibujo, lo insertamos en la base de datos.

    $conn->set_charset('utf8mb4') or sendError($conn->error);
    $contents = addslashes(file_get_contents('php://input'));
    $sql = "INSERT INTO dibujos (id_usuario,dibujo,reg_date) VALUES('".$usuario_id."', '".$contents."', NOW())";
    $stmt = $conn->prepare($sql) or sendError($conn->error);
    //$stmt->bind_param('ib', $usuario_id, $contents) or sendError($stmt->error);

    if ($stmt->execute()  === TRUE) {
        echo "Dibujo subido con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
?>