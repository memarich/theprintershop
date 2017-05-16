<?php

// -------------------------- registro.php --------------------------------

/* --------------- Estoy cargando el archivo funciones.php --------------- */
require_once("funciones.php");

/* ------------------------ Iniciacion de variables  --------------------- */

$nombres = "";
$apellido = "";
$mail = "";
$dni = "";
$celular = "";
$calle = "";
$numero = "";
$piso = "";
$departamento = "";
$codpos = "";
$localidad = "";
$provincia = "";

$errores = [];

/* -----------  FIN   ------ Iniciacion de variables  --------------------- */

/*     Con POST realizo la validacion de datos ingresados por el usuario    */

if ($_POST){

  $errores = validarInformacion($_POST);

  if (count($errores) == 0){
    // No hay errores pero falta controlar imagen
    $errores = guardarImagen("imagen",$errores);
    if (count($errores) == 0){
      $usuario = crearUsuario($_POST);
      guardarUsuario($usuario);
      // Me voy a loguear una vez registrado correctamente
      header('location:acceso.php');
      exit;
    }
  }

// Los campos sin errores se traen y llenan el formulario
  if (!isset($errores["nombres"])) {
    $nombres = $_POST["nombres"];
  }

  if (!isset($errores["apellido"])) {
    $apellido = $_POST["apellido"];
  }

  if (!isset($errores["mail"])) {
    $mail = $_POST["mail"];
  }

  if (!isset($errores["dni"])) {
    $dni = $_POST["dni"];
  }

  if (!isset($errores["celular"])) {
    $celular = $_POST["celular"];
  }

  if (!isset($errores["calle"])) {
    $calle = $_POST["calle"];
  }

  if (!isset($errores["numero"])) {
    $numero = $_POST["numero"];
  }

  if (!isset($errores["piso"])) {
    $piso = $_POST["piso"];
  }

  if (!isset($errores["departamento"])) {
    $departamento = $_POST["departamento"];
  }

  if (!isset($errores["codpos"])) {
    $codpos = $_POST["codpos"];
  }

  if (!isset($errores["localidad"])) {
    $localidad = $_POST["localidad"];
  }

  if (!isset($errores["provincia"])) {
    $provincia = $_POST["provincia"];
  }


}

/*   ----------------------------------- FIN ------------------------------ */


 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>THE PRINTER SHOP</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font/Transformers Movie.ttf" rel='stylesheet' type='text/css'>

    <link href="https://fonts.googleapis.com/css?family=Anaheim|Armata|Averia+Sans+Libre|Averia+Serif+Libre|Bungee|Bungee+Hairline|Cantarell|Droid+Sans+Mono|Exo+2|Gruppo|Julius+Sans+One|Nova+Square|Overlock+SC|Overpass+Mono|Play|Quantico|Share+Tech+Mono|Source+Code+Pro" rel="stylesheet">
	<link href="images/rgb.png" rel="shortcut icon">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  </head>

  <body>
    <div style="
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);">
    </div>
   <header class="main-header">
    <div class="container">
      <a href="index.php"><img src="images/logo-02.png" width="367" height="80" class="logo"></a>
    </div>
        <a href="#" class="toggle-nav">
  				<span class="ion-navicon-round"></span>
  			</a>
        <nav class="main-nav">
  				<ul>
  					<li><a href="index.php">Home</a></li>
  					<li><a href="acceso.php">Acceso</a></li>
  					<li><a href="productos.php">Productos</a></li>
  					<li><a href="preguntas.php">FAQs</a></li>
  					<li><a href="contacto.php">Contacto</a></li>
  				</ul>
  			</nav>
  		</header>

        <section class="new_user_section">

          <strong><h1>Nuevo Usuario</h1></strong><br><br>

          <div class="container">
            <!--         Listado de Errores   ................................... -->

            <div class="errores">
              <?php if (count($errores)>0) { ?>
                <ul>
                  <?php foreach ($errores as $error) { ?>
                    <li>
                      <?php echo $error;
                             echo "<br>"; ?>
                    </li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </div>

            <!--         Fin de listado de errrores   ..........................   -->

          <form action="registro.php" method="post" enctype="multipart/form-data">

            <label>Nombres:
              <input type="text" name="nombres" value="<?php echo $nombres; ?>">
            </label><br><br>

            <label>Apellido:
              <input type="text" name="apellido" value="<?php echo $apellido; ?>">
            </label><br><br>

            <label>Correo electrónico:
              <input type="email" name="mail" value="<?php echo $mail; ?>">
            </label><br><br>

            <label>Contraseña:
              <input type="password" name="pass" required>
            </label><br><br>

            <label>Confirmar contraseña:
              <input type="password" name="passc" required>
            </label><br><br>

            <label>DNI:
              <input type="text" name="dni" value="<?php echo $dni; ?>">
            </label><br><br>

            <label>Celular:
             <input type="text" name="celular" value="<?php echo $celular; ?>">
            </label><br><br>

            <label><strong>Domicilio</strong></label><br><br>
            <label>Calle:
              <input type="text" name="calle" value="<?php echo $calle; ?>">
            </label><br><br>

            <label>Número:
              <input type="text" name="numero" value="<?php echo $numero; ?>">
            </label><br><br>

            <label>Piso:
              <input type="text" name="piso" value="<?php echo $piso; ?>">
            </label><br><br>

            <label>Departamento:
              <input type="text" name="departamento" value="<?php echo $departamento; ?>">
            </label><br><br>

            <label>Código postal:
              <input type="text" name="codpos" value="<?php echo $codpos; ?>">
            </label><br><br>

            <label>Localidad:
              <input type="text" name="localidad" value="<?php echo $localidad; ?>">
            </label><br><br>

            <label>Provincia:
              <input type="text" name="provincia" value="<?php echo $provincia; ?>">
            </label><br><br>


            <label>Imagen de perfil
              <input type="file" name="imagen">
            </label><br><br>

            <label>
              <input type="submit" value="Registrar">
            </label>

            <label>
              <input type="reset" value="Limpiar">
            </label>

          </form>
    </div>
        </section>
        <footer>
           <div class="container-footer">

            <div class="menu">
               <ul>
                 <li><a href="index.php">Home</a></li>
                 <li><a href="registro.php">Registro</a></li>
                 <li><a href="acceso.php">Acceso</a></li>
               </ul>
             </div>

            <div class="menu">
               <ul>
                 <li><a href="productos.php">Productos</a></li>
                 <li><a href="preguntas.php">Preguntas Frecuentes</a></li>
                 <li><a href="contacto.php">Contacto</a></li>
               </ul>
             </div>

            <div class="menu">
               <ul>
                 <li><a href="http://www.facebook.com" target="_blank"><img src="images/fb-01.png" alt=""></a></li>
                 <li><a href="http://www.twitter.com" target="_blank"><img src="images/twi-01.png" alt=""></a></li>
                 <li><a href="http://www.linkedin.com" target="_blank"><img src="images/lin-01.png" alt=""></a></li>
               </ul>
             </div>

            <div class="footer-copyright">
               <p>&copy 2017 The Printer Shop - Lográ la mejor impresión</p>
             </div>
           </div>

      </footer>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        $('.toggle-nav').click(function(){
            $('.main-nav ul').slideToggle('medium')
        })
    </script>
  </body>
</html>
