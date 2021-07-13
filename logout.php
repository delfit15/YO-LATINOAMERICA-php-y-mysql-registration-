
<?php
    
    session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 

    // comprobamos que se haya iniciado la sesión 
    if(isset($_SESSION['usuario_usuario'])) { 
        //se destruye la sesión de usuario que esta registrado
		session_destroy(); 
        //se volverá a la página de acceso
		header("Location: acceso_main.php"); 
    }else { 
        echo "Operación incorrecta";
    } 
?>


