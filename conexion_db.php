

<?php 
//Creación de archivo de configuración de acceso a MySQL:
// datos de acceso a nuestra Base de Datos (conecto scripts de php a la base de datos)

    $host_db = "localhost"; // Host,Server de la BD 
    $usuario_db = "root"; // Usuario preestablecido de la BD 
    $clave_db = ""; // Contraseña de la BD 
    $nombre_db = "bd_cavallaro"; // Nombre de la base de datos
     
    //conectamos y seleccionamos db
    $conn = new mysqli($host_db, $usuario_db, $clave_db, $nombre_db);
    
    // Chequeamos la conexion
    if ($conn->connect_error) {
        die("Conexión Fallida" . $conn->connect_error);
    }
    
?>
