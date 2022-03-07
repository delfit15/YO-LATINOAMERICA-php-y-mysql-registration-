<?php
    //Datos para conectarse al server
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    // Crear conexion
    $conn = new mysqli($servername, $username, $password);
    
    // Chequeando conexión
    if ($conn->connect_error) {
        die("La conexion ha fallado: " . $conn->connect_error);
    } else{
    echo "Conectado!";
    }
    
    ///////////////////////////////////////////////////////////////////////
    
    //Construyo la query para crear la base de datos
    $sql = "CREATE DATABASE bd_cavallaro DEFAULT COLLATE utf8_spanish_ci";
    
    //Paso la query a mysql y evaluo si se creo o hay algún error
    if ($conn->query($sql) === TRUE)
    {
        echo "La base de datos ha sido creada";
    }
    else
    {
        echo "Error en la creación de la base de datos: " . $conn->error;
    }
    
    //Cierro la conexión
    $conn->close();
?>
