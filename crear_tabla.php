<?php
    /////////////////////////////
    //Abro la conexión
    include('conexion_db.php'); 
    
    /////////////////////////////
    $admin_clave= 'admin123';
    $admin_clave = md5($admin_clave);
    //Construyo la query
    $sql = "CREATE TABLE usuarios (id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, usuario VARCHAR (255) NOT NULL DEFAULT '', nombre VARCHAR(255) NOT NULL DEFAULT '' , apellido VARCHAR(255) NOT NULL DEFAULT '', clave text NOT NULL DEFAULT '', imagen VARCHAR (255) NOT NULL DEFAULT '', bio VARCHAR (255) NOT NULL DEFAULT '', reg_date TIMESTAMP )";
    // creo tabla para dibujos
    $sql2 = "CREATE TABLE dibujos (id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, id_usuario INT(10) NOT NULL, dibujo VARCHAR(255) NOT NULL DEFAULT '', reg_date TIMESTAMP)";
   
    //creo usuario admin
    $admin = "INSERT INTO usuarios (id,usuario,clave,imagen) VALUES ('1','admin', '".$admin_clave."', 'imagen_default.jpg')";


    //Paso la query a MySQL para que cree las tabla e admin y corroboro que no haya errores.
   
   if ($conn->query($sql) === TRUE) {
        echo "La tabla usuarios ha sido creada exitosamente";
        echo "<br>";
    } else {
        echo "Error creando tabla: " . $conn->error ;
        echo "<br>";
    }

    if ($conn->query($sql2) === TRUE) {
        echo "La tabla dibujos ha sido creada exitosamente";
        echo "<br>";
    } else {
        echo "Error creando tabla: " . $conn->error ;
        echo "<br>";
    }
    

   if ($conn->query($admin) === TRUE) {
        echo "El usuario admin ha sido creada exitosamente";
    } else {
        echo "Error al ingresar usuario admin. " . $conn->error ;
    }

    $conn->close();
    ?>

