
 
 <?php 
//Cuando el usuario está registrado puede acceder a ésta página. 
 
 session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 
// comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
if(isset($_SESSION['usuario_usuario'])) {
    	
?>

 <a href="restringida_paint.php">Soy, Soy lo que dejaron, soy toda la sobra de lo que se robaron.</a>; 
 <a href="restringida_paint.php">Un pueblo escondido en la cima, mi piel es de cuero por eso aguanta cualquier clima.</a>; 
 <a href="restringida_paint.php">Soy una fábrica de humo,mano de obra campesina para tu consumo.</a>; 
 <a href="restringida_paint.php">Frente de frio en el medio del verano, el amor en los tiempos del cólera, mi hermano.</a>; 
 <a href="restringida_paint.php">El sol que nace y el día que muere, con los mejores atardeceres.</a>; 
 <a href="restringida_paint.php">Soy el desarrollo en carne viva, un discurso político sin saliva.</a>; 
 <a href="restringida_paint.php">Las caras más bonitas que he conocido, soy la fotografía de un desaparecido.</a>; 
 <a href="restringida_paint.php">Soy la sangre dentro de tus venas,soy un pedazo de tierra que vale la pena.</a>; 
 <a href="restringida_paint.php">Soy una canasta con frijoles, soy Maradona contra Inglaterra anotándote dos goles.</a>; 
 <a href="restringida_paint.php">Soy lo que sostiene mi bandera, la espina dorsal del planeta es mi cordillera.</a>; 
 <a href="restringida_paint.php">Soy lo que me enseño mi padre, el que no quiere a su patria no quiere a su madre.</a>; 
 <a href="restringida_paint.php">Soy América latina, un pueblo sin piernas pero que camina</a>; 
 <a href="restringida_paint.php">Estribillo: Tú no puedes comprar al viento, tú no puedes comprar al sol, tú no puedes comprar la lluvia,
tú no puedes comprar el calor, tú no puedes comprar las nubes, tú no puedes comprar los colores,
tú no puedes comprar mi alegría, tú no puedes comprar mis dolores.</a>; 
<a href="restringida_paint.php">Tengo los lagos, tengo los ríos, tengo mis dientes pa cuando me sonrío.</a>; 
 <a href="restringida_paint.php">La nieve que maquilla mis montañas, tengo el sol que me seca y la lluvia que me baña.</a>; 
 <a href="restringida_paint.php">Un desierto embriagado con bellos de un trago de pulque, para cantar con los coyotes, todo lo que necesito.</a>; 
 <a href="restringida_paint.php">Soy, Soy lo que dejaron, soy toda la sobra de lo que se robaron.</a>; 
 <a href="restringida_paint.php">Soy, Soy lo que dejaron, soy toda la sobra de lo que se robaron.</a>; 
 <a href="restringida_paint.php">Soy, Soy lo que dejaron, soy toda la sobra de lo que se robaron.</a>; 

 


Tengo mis pulmones respirando azul clarito. La altura que sofoca.

Soy las muelas de mi boca mascando coca.

El otoño con sus hojas desmalladas. Los versos escritos bajo la noche estrellada.

Una viña repleta de uvas. Un cañaveral bajo el sol en cuba.

Soy el mar Caribe que vigila las casitas, haciendo rituales de agua bendita.

El viento que peina mi cabello. Soy todos los santos que cuelgan de mi cuello.

El jugo de mi lucha no es artificial,Porque el abono de mi tierra es natural.

No puedes comprar mi vida, mi tierra no se vende.

Trabajo en bruto pero con orgullo, aquí se comparte, lo mío es tuyo.

Este pueblo no se ahoga con marullos, y si se derrumba yo lo reconstruyo.

Tampoco pestañeo cuando te miro, para q te acuerdes de mi apellido.

La operación cóndor invadiendo mi nido,¡Perdono pero nunca olvido!

Aquí se respira lucha, yo canto porque se escucha.

Aquí estamos de pie,¡Que viva Latinoamérica!

<?php 
}
	else { 
        echo "Estas accediendo a una pagina restringida, para ver su contenido debes estar registrado.<br />
        <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrate</a>"; 
    } 



    ?>	