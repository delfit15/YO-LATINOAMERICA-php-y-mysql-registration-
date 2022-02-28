<?php
 //Cuando el usuario está registrado puede acceder a ésta página. 

    session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
  
    $usuario_id = $_SESSION['usuario_id']; 

    // obtenemos el dibujo
    $sql = "SELECT * FROM dibujos WHERE id_usuario = ? ORDER BY reg_date DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
   // $result = $conn->query($sql);
   // $row = mysqli_fetch_assoc($result);
    header('Content-type:image/png');
    echo '<img src="data:image/png;base64,'.base64_encode($row['dibujo']).'"/>';
?>


