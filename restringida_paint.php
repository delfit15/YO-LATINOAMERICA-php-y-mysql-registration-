
<?php 

session_start(); 

include('conexion_db.php'); // incluímos los datos de acceso a la BD 
// comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
if(isset($_SESSION['usuario_usuario'])) {
?>
</script>

         <!-- Aquí ponemos todo el código HTML de nuestra pagina restringida, desde <html> a </html>
              Incluimos el archivo P5.js con el paint--> 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script src="processing/p5.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="processing/sketch_paint.js"></script>
</head>
<body id="paint-canvas">
<div class="">
<a href="acceso_main.php">Volver</a> 
<!-- botones de enviar y ver en galeria -->
<button class="btn btn-primary" id="enviar" name="enviar" method="post">Enviar</button>
<button class="btn btn-primary" id="ultimo" name="ultimo" method="get">Ver en Galeria</button>
</div>
<script>
  
  // seteamos un event listener en el boton de enviar el canvas
  document.getElementById('enviar').addEventListener('click', function() {
    
    // obtenemos el canvas de processing
    var canvas = document.getElementById('defaultCanvas0');
    // recortamos el canvas a la zona del dibujo solamente.
    var newCanvas = document.createElement('canvas');
    var desiredWidth= 980; // tamaño en galeria 
    var desiredHeight=550;
    newCanvas.width = desiredWidth;
    newCanvas.height = desiredHeight;
    newCanvas.getContext('2d').drawImage(canvas,0,60,1960,1100,0,0,desiredWidth, desiredHeight); //dibujamos el canvas recortado
    var dataURL = newCanvas.toDataURL("image/png"); //lo convertimos en imagen
    
    // post del dibujo como imagen 
    $.ajax({
      type: "POST",
      url: "saveDibujo.php",
      data: { 
        image: dataURL
      }
    }).done(function(msg) {
      console.log("Subida completa: " + msg);
      alert("Dibujo Subido!"); 
    }).fail(function(msg) {
      console.log("Subida fallida: " + msg);
    });
  });

  // obtenemos el dibujo guardado
  document.getElementById('ultimo').addEventListener('click', function() {    
    var req = new XMLHttpRequest();
    req.open('GET', 'getDibujo.php');
    req.onload = function () {
        console.log('se obtuvo el dibujo, respuesta del server:', req.response);
    };
    req.send();

    window.location.replace("getDibujo.php"); // me lleva a la galeria de dibujos
  });

</script>

<?php  //Si no se ha iniciado sesión, lo indicamos...

}
	else { 
        echo "Estas accediendo a una pagina restringida, para ver su contenido debes estar registrado.<br />
        <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrate</a>"; 
    } 
    ?>	
    
</body>

</html>

