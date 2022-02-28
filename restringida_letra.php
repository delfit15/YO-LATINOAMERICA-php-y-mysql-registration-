
 
 <?php 
//Cuando el usuario está registrado puede acceder a ésta página. 
 
 session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 
// comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
if(isset($_SESSION['usuario_usuario'])) {
       

?>

 <a href="restringida_paint.php">Soy, Soy lo que dejaron, soy toda la sobra de lo que se robaron.</a> 
 <br>
 <a href="restringida_paint2.php">Un pueblo escondido en la cima, mi piel es de cuero por eso aguanta cualquier clima.</a> 
 <br>
 <a href="restringida_paint3.php">Soy una fábrica de humo,mano de obra campesina para tu consumo.</a> 
 <br>
 <a href="restringida_paint4.php">Frente de frio en el medio del verano, el amor en los tiempos del cólera, mi hermano.</a> 
 <br>
 <a href="restringida_paint5.php">El sol que nace y el día que muere, con los mejores atardeceres.</a> 
 <br>
 <a href="restringida_paint6.php">Soy el desarrollo en carne viva, un discurso político sin saliva.</a>
 <br> 
 <a href="restringida_paint7.php">Las caras más bonitas que he conocido, soy la fotografía de un desaparecido.</a> 
 <br>
 <a href="restringida_paint8.php">Soy la sangre dentro de tus venas,soy un pedazo de tierra que vale la pena.</a> 
 <br>
 <a href="restringida_paint9.php">Soy una canasta con frijoles, soy Maradona contra Inglaterra anotándote dos goles.</a> 
 <br>
 <a href="restringida_paint10.php">Soy lo que sostiene mi bandera, la espina dorsal del planeta es mi cordillera.</a> 
 <br>
 <a href="restringida_paint11.php">Soy lo que me enseño mi padre, el que no quiere a su patria no quiere a su madre.</a> 
 <br>
 <a href="restringida_paint12.php">Soy América latina, un pueblo sin piernas pero que camina</a> 

<?php 
}
	else { 
        echo "Estas accediendo a una pagina restringida, para ver su contenido debes estar registrado.<br />
        <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrate</a>" ;
    } 



    ?>	