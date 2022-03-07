

<?php 
//P�ginas restringidas:
//Como en toda web con sistema de usuarios, siempre habr�n zonas restringidas 
//a las que s�lo podr�n acceder usuarios registrados, entonces para ello partimos del siguiente c�digo:

    session_start(); 
    include('conexion_db.php'); // inclu�mos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesi�n, o sea que un usuario autorizado haya iniciado sesion

    // si es admin..
    if($_SESSION['usuario_usuario']=='admin') { 
?> 

<?php

//seleccionamos al usuario y procesamos su eliminacion. 
mysqli_select_db($conn, "usuario");

$name=$_POST['borrar'];

//hacemos la consulta borrando solamente el registro que tiene el usuario con el name seleccionado.
if(mysqli_query($conn,"DELETE FROM usuarios WHERE usuario='$name'"))
{
echo "el usuario " . $_POST['borrar'] . " ha sido eliminado de la base de datos con exito";
echo "Volver a la sesión de Administrador <a href=\"acceso_main.php\">Administrar</a>";
}
else
{
echo "El usuario no pudo ser eliminado";

}

//cerramos la conexion
mysqli_close($conn);
?>


<?php 
    }
	//Si no es así, o sea no se ha iniciado sesion, lo indicamos...
	else { 
        echo "Estás accediendo a una página restringida, para ver su contenido debes estar registrado.<br /> 
        <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrarme</a>"; 
    } 
?>