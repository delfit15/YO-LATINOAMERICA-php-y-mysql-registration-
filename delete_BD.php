<?php 
//P�ginas restringidas:
//Como en toda web con sistema de usuarios, siempre habr�n zonas restringidas 
//a las que s�lo podr�n acceder usuarios registrados, entonces para ello partimos del siguiente c�digo:

    session_start(); 
    include('conexion_db.php'); // inclu�mos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesi�n, o sea que un usuaior autorizado haya iniciado sesion

    if($_SESSION['usuario_usuario']=='admin') { 
?> 


<html>
<body>
<?php


$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<h1>Eliminar usuario</h1>
<p>Selecciona un Usuario:</p>
<form action="procesar_delete_BD.php" class="login100-form validate-form flex-sb flex-w" method="post">
<select class="input100" name="borrar">

<?php
while ($row=$result->fetch_assoc())
{
echo "<option value=".$row['usuario'].">".$row['usuario']."</option>\n"; 
}
?>
</select>
<button name="enviar" class="login100-form-btn"> Eliminar </button>
</form>



<?php 
    echo "<br>";
	echo "Volver a la sesión de Administrador <a href=\"acceso_main.php\">Administrar</a>";
    }
	//Si no es asi, o sea no se ha iniciado sesion, lo indicamos...
	else { 
        echo "Estas accediendo a una página restringida, donde solo el administrador puede acceder.<br /> 
        <a href='acceso_main.php'>Volver</a>"; 
    }
    

?>


</body>
</html>
