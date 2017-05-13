<?php

require_once("funciones.php");

/*                                                        */
if(estaLogueado()){
  header("location:bienvenida.php");
  exit;
}
/* ----------------------------------------------------------------------- */

// Inicializar variable errores
$errores = [];

if ($_POST){
  // Validar los datos ingresados por Login
  $errores = validarLogin($_POST);

  // Hay errores ?
    if ($errores == []){
    $usuario = buscarPorEmail($_POST["mail"]);
    loguear($usuario);

    // Si esta seteado recordame se crea una cookie
    if (isset($_POST["recordame"])){
      setcookie("idUser",$usuario["id"],time()+3600*24*30);
    }
    header("location:index.php?");
    exit;
  }
}

 ?>

// Comienzo de codigo HTML


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
	<link href="images/logo-02.png" rel="shortcut icon">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  </head>

  <body>
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
            <li><a href="registro.php">Registro</a></li>
  					<li><a href="productos.php">Productos</a></li>
  					<li><a href="preguntas.php">FAQs</a></li>
  					<li><a href="contacto.php">Contacto</a></li>
  				</ul>
  			</nav>
  		</header>

    <section class="access_user_section">
      <h1><strong>Acceso de usuarios</strong></h1><br>

      <!-- ***************************Listado de errores ********************** -->
            <div>
              <?php if (count($errores)>0): ?>
                <ul>
                  <?php foreach ($errores as $error): ?>
                    <li>  <?=$error?>  </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

            </div>
      <!-- ********************************************************************* -->

      <form action="acceso.php" method="post">


        <label>Correo electrónico:
          <input type="mail" name="mail" value="">
        </label><br><br>

        <label>Contraseña:
          <input type="password" name="pass" value="">
        </label><br><br>

        <div class="">
          <label for="reco">Recordame</label>
          <input id="reco" type="checkbox" name="recordame" value="si">
        </div>

        <label>
          <input type="submit" value="Ingresar">
        </label>
      </form>
    </section>

    <section class="link-section">
      <a href="registro.html">Registro de usuario nuevo</a>
      <a href="#">¿Ha olvidado su contraseña?</a>
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
