<?php 
//P�ginas restringidas:
//Como en toda web con sistema de usuarios, siempre habr�n zonas restringidas 
//a las que s�lo podr�n acceder usuarios registrados, entonces para ello partimos del siguiente c�digo:

    session_start(); 
    include('conexion_db.php'); // inclu�mos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesi�n, o sea que un usuaior autorizado haya iniciado sesion

    if($_SESSION['usuario_usuario']=='admin') { 
?> 


<?php
//conectamos

$con = mysql_connect("localhost","root","db_cavallaro");
if (!$con)
  {
  die('Error conexión: ' . mysql_error());
  }

//seleccionamos
mysql_select_db("usuario", $con);

$name=$_POST['borrar'];

//hacemos la consulta borrando solamente el registro que tiene como lastname Griffin
if(mysql_query("DELETE FROM usuarios WHERE usuario='$name'"))
{
echo "el usuario " . $_POST['borrar'] . " ha sido eliminado de la base de datos con exito";
echo "Volver a la sesión de Administrador <a href=\"acceso_main.php\">Administrar</a>";
}
else
{
echo "El usuario no pudo ser eliminado";

}

//cerramos la conexion
mysql_close($con);
?>


<?php 
    }
	//Si no es así, o sea no se ha iniciado sesion, lo indicamos...
	else { 
        echo "Estás accediendo a una página restringida, para ver su contenido debes estar registrado.<br /> 
        <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrarme</a>"; 
    } 
?>