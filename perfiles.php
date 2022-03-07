<?php 
    session_start(); //inicio sesión (obligatorio)
    include('conexion_db.php'); //incluyo ingreso a base de datos


    // comprobamos que se haya iniciado la sesión, o sea que un usuario autorizado haya iniciado sesión
if(isset($_SESSION['usuario_usuario'])) {
	include ('navbar.html');

    ?>
    
 <!DOCTYPE html>
 <html>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="css/estilos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

 			<?php 
 				//editar perfil al apretar boton de editar
			 if(isset($_POST['submit1'])) 
 				{
 					?>
 						<script type="text/javascript">
 							window.location="editar_perfil.php"
 						</script>

 					<?php
 				}


				 //tomamos los datos del usuario para mostrarlos en su perfil

 				$q= "SELECT * FROM usuarios where usuario='$_SESSION[usuario_usuario]' ;";
				 $result=$conn->query($q);
				 $row=mysqli_fetch_assoc($result);
 
				 $usuario= "$_SESSION[usuario_usuario]";
 
 			?>
			 <section class="cv-block block-intro border-bottom">
       		 <div class="container">
				<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Editar</button>
 				</form>
         		 <div class="avatar">
					  <img class="img-fluid rounded-circle"  src=" <?php echo 'fotos/' . $row['imagen'] ?>" width="200" height="200" alt=""> 
					  </div>
					  
					  <?php
					  //mostramos los datos
					  echo "<h4 style='bold'>USUARIO</h4>";
						echo $row['nombre']; 
						echo " ";
						echo $row['apellido'];
						echo "<br>";
						echo "@";
					    echo $row['usuario'];
						echo "<br>";
						echo "<br>";
						echo "<h4 style='bold'>BIO</h4>";
						echo $row['bio']; 
						echo "<br>";echo "<br>";
					
					?> 


						</div>
    		  </section>

					
					
					   
		 
		   </html>




 			<?php
 	

            }

            else {  // si no es usuario registrado..
                echo "Estas accediendo a una pagina restringida, para ver su contenido debes estar registrado.<br />
                <a href='acceso_main.php'>Ingresar</a> / <a href='registro.php'>Regitrate</a>"; 
            } 
 			?>
 	
 </html>


