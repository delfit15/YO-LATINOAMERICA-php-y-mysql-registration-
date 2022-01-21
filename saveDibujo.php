<?php
 <?php 
 //Cuando el usuario está registrado puede acceder a ésta página. 
  
  session_start(); 
     include('conexion_db.php'); // incluímos los datos de acceso a la BD 
 // comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
 if(isset($_SESSION['usuario_usuario'])) {
  
    $sql1 ="SELECT * FROM usuarios WHERE usuario='".$_SESSION['usuario_usuario']."'";

if (!isset($_FILES['snapshot'])) sendError('Missing file', 400);

$fd = fopen($_FILES['snapshot']['tmp_name'], 'rb');
$mimeType = mime_content_type($fd);
fclose($fd);

$matchResult = preg_match('#^image/#', $mimeType);

if ($matchResult === false) {
    sendError("Couldn't parse MIME type");
}
if ($matchResult === 0) {
    sendError('Wrong MIME type', 400);
}

$mysqli = new mysqli('localhost:3306', 'root', '', 'registration');
if ($mysqli->connect_error) {
    sendError($mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4') or sendError($mysqli->error);

$username = $_SESSION['username'];
$contents = file_get_contents($_FILES['snapshot']['tmp_name']);

$query = 'INSERT INTO uploads (username, file) VALUES (?, ?)';
$stmt = $mysqli->prepare($query)              or sendError($mysqli->error);
$stmt->bind_param('ss', $username, $contents) or sendError($stmt->error);
$stmt->execute()                              or sendError($stmt->error);

echo 'Ok';

 
}
	else { 
        echo "Estas accediendo a una pagina restringida, para ver su contenido debes estar registrado.<br />
        <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrate</a>"; 
    } 



    ?>	