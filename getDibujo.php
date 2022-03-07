<?php
 //Cuando el usuario está registrado puede acceder a ésta página. 

    session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 
    include('navbar.html');
    
?>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>


<body>
	<?php

	//Programa que muestra en una tabla de 4 columnas todas las imágenes de el 
    //directorio "dibujos".
	
	//Con opendir abrimos una carpeta del servidor donde estan las imagenes 
		if ($gestor = opendir('dibujos'))
			{
               
				echo "<table class='table-galeria' border=0>";
				echo "<tr>";
				$i=0;
				
				//Mientras readir no de falso, pegamos las fotos
				//readir va pasando los nombres de los archivos hasta que se acaban
				//en este caso nos pasa los nombres de la imagenes
				while (false !== ($archivo = readdir($gestor)))
					{
					//Mientras el archivo sea distinto de "nada" seguimos
						if ($archivo!="." && $archivo!="..")
							{
							//Se van armando filas de 4 imágenes
								if ($i==4)
									{
										$i=0;
										echo "</tr>";
										echo "<tr>";
									}
								$i++;
             
								echo "<td>";
								echo "<div class='photo-gallery'><a data-lightbox='photos' href=dibujos/$archivo><img class='img-fluid' src=dibujos/$archivo></a></div>";
								echo "</td>";
							}	
					}
				echo "</tr>";
				echo "</table>";
             
				closedir($gestor);
			}
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>


 