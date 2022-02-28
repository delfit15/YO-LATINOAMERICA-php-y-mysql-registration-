
<?php 

/*$sql1 ="SELECT * FROM usuarios WHERE usuario='".$_SESSION['usuario_usuario']."'";

$result=$conn->query($sql1);
$row=mysqli_fetch_assoc($result);

$index = 0; // suma de dibujos 

$imagenes = array(); // array de dibujos subidos


//leo nombre de registros armando una opcion por cada uno
// voy sumando index al subir los dibujos
while ($row = $result->fetch_assoc())
{
    $imagenes[$index] = $row['dibujos'];
    $index++;
} 
?> 
<script type='text/javascript'>
<?php   
  $js_array = json_encode($imagenes); // muestra imagenes en mi web
  echo "var javascript_array = ". $js_array . ";\n"; 

*/

//Cuando el usuario está registrado puede acceder a ésta página. 

session_start(); 
include('conexion_db.php'); // incluímos los datos de acceso a la BD 
// comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
if(isset($_SESSION['usuario_usuario'])) {

?>

</script>

         <!-- Aquí ponemos todo el código HTML de nuestra pagina restringida, desde <html> a </html>--> 
<!DOCTYPE html>
<html>

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script src="processing/p5.js"></script>
 
</head>

<header><strong><?=$_SESSION['usuario_nombre'].' '.$_SESSION['usuario_apellido']?></strong> | <a href="logout.php">Salir</a></header>

<div>
  <script src="processing/sketch_paint.js"></script>
  <button id="enviar" name="enviar" method="post">Enviar</button>
  <button id="ultimo" name="ultimo" method="get">Galeria</button>
</div>

<script>
  // seteamos un event listener en el boton de enviar el canvas
  document.getElementById('enviar').addEventListener('click', function() {
    
    // obtenemos el canvas de processing
    var canvas = document.getElementById('defaultCanvas0');
    //let c = get(0,0,250,250);

    canvas.toBlob(function (blob) {
      var req = new XMLHttpRequest();
      req.open('POST', 'saveDibujo.php');

      req.onload = function () {
        console.log('subida completa, respuesta del server:', req.response);
      };

      console.log('subiendo canvas...');
      req.send(blob);
    });
  });

  document.getElementById('ultimo').addEventListener('click', function() {    
    var req = new XMLHttpRequest();
    req.open('GET', 'getDibujo.php');
    req.onload = function () {
        console.log('se obtuvo el dibujo, respuesta del server:', req.response);
    };
    req.send();
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

