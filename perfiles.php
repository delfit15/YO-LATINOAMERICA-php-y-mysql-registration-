<?php 
    session_start(); //inicio sesión (obligatorio)
    include('conexion_db.php'); //incluyo ingreso a base de datos
	


    // comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
if(isset($_SESSION['usuario_usuario'])) {
    ?>
    
 <!DOCTYPE html>
 <html>

 <p> <a href="acceso_main.php">Inicio</a>  |  <a href="perfiles.php">Perfil</a> | <a href="logout.php">Salir</a></p>



 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Editar</button>
 		</form>
 			<?php 
 				
			 if(isset($_POST['submit1'])) 
 				{
 					?>
 						<script type="text/javascript">
 							window.location="editar_perfil.php"
 						</script>

 					<?php
 				}


                //$result = $conn->query($sql);
 				$q= "SELECT * FROM usuarios where usuario='$_SESSION[usuario_usuario]' ;";
				 $result=$conn->query($q);
				 $row=mysqli_fetch_assoc($result);
 
				 $usuario= "$_SESSION[usuario_usuario]";
 
 			?>
 			<h2 style="text-align: center;">Perfil @<?php echo $row['usuario'];   ?>    </h2>

 		
					   <h4>Imagen de Perfil</h4>
					  <img src=" <?php echo 'fotos/' . $row['imagen'] ?>" width="90" height="90" alt=""> 

					  
					  <?php
					  echo "<br>";
					  echo "<br>";
					  echo "Bio";
					  echo "<br>";
                       echo $row['bio']; 
					   echo "<br>";echo "<br>";
					  echo $row['nombre']; 
					  echo " ";
				     echo $row['apellido'];
				     echo "<br>";
			

				?> 
					
					   
		 
		   </html>




 			<?php
 	

            }

            else { 
                echo "Estas accediendo a una pagina restringida, para ver su contenido debes estar registrado.<br />
                <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrate</a>"; 
            } 
 			?>
 	
 </html>



