<?php 
//Páginas restringidas:
//Como en toda web con sistema de usuarios, siempre habrán zonas restringidas 
//a las que sólo podrán acceder usuarios registrados, entonces para ello partimos del siguiente c�digo:

    session_start(); 
    include('conexion_db.php'); // incluímos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesión, o sea que un usuaior autorizado haya iniciado sesion

    if($_SESSION['usuario_usuario']=='admin') 
		{ 
?> 

<?php
						//Realizo una consulta a todos los registros de usuario
			$sql = "SELECT * FROM usuarios";
            $result = $conn->query($sql);
			//creo un formulario que tenga un combo select
?>

            <div class="container">
            <div class="jumbotron">
            <h1>Ver datos de los usuarios</h1>
            <p>Selecciona un Usuario:</p>
            </div>
			<form action="ver_BD.php" method="post">
			<select name="ver" onchange= "this.form.submit()">

<?php
			//leo nombre de registros armando una opcion por cada uno
			while ($row=$result->fetch_assoc())
				{
					echo "<option value=".$row['usuario'].">".$row['usuario']."</option>\n"; 
				}
	
?>

			</select>
			</form>




<?php
			//si el registro ya esta seteado lo muestro sino no
			if(isset($_POST['ver']))
				{
					$name=$_POST['ver'];
					$sql = "SELECT * FROM usuarios WHERE usuario='$name'";
                    $seleccion = $conn->query($sql);

					while($row = $seleccion->fetch_assoc())
						{
							//imprimo la informaci�n que quiero
							echo "<br>";
							echo "Numero de Id= " . $row['id'];
							echo "<br>";
							echo "Nombre de Usuario = " . $row['usuario'];
							echo "<br>";
							echo "Nombre = " . $row['nombre'];
							echo "<br>";
							echo "Apellido = " . $row['apellido'];
							echo "<br>";
							echo "Fecha de Ingreso = " . $row['reg_date'];
							echo "<br>";
							echo "<br>";
						}

				}
    echo "<br>";
	echo "Volver a la sesión de Administrador <a href=\"acceso_main.php\">Administrar</a>";
				
 ?>
				</div>
 <?php
		}
		//Si no es asi, o sea no se ha iniciado sesion, lo indicamos...
		else { 
				echo "Estás accediendo a una página restringida, donde solo el administrador puede acceder.<br /> 
				<a href='acceso_main.php'>Volver</a>"; 
			} 
?>