<?php

// -----------------------   index.php ------------------------------------
require_once("funciones.php");

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
  	<link href="images/logo-02.png" rel="shortcut icon">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  </head>
  <body>

    <header class="main-header">

      <!-- Coloque el login y registro por ahora aqui ********************* -->
      <?php if(!estaLogueado()){ ?>
          <form class="login" action="acceso.php" method="post">
            <div class="">
              <br><br>
              <button type="submit">LOGIN</button>
            </div>
          </form>
          <form class="regis" action="registro.php" method="post">
            <div class="">
              <br><br>
              <input type="submit" value="REGISTRO">
            </div>
          </form>
      <?php }else{ ?>
        <form class="logout" action="logout.php" method="post">
          <div class="">
            <br><br>
            <input type="submit" value="LOGOUT">
          </div>
        </form>
      <?php } ?>
      <!--  ************************************************************** -->
      <?php
      if(estaLogueado()){
        $id = $_SESSION["idUser"];
        $usuario = buscarPorId($id);
        $texto_busqueda = "imagenesUsuario/".$usuario["mail"].".*";
        $file = glob($texto_busqueda);
        $file = $file[0];
      ?>
      <div class="usuarioNombre">
        <?php
         echo $usuario["nombres"];
         echo $usuario["apellido"];
         ?>
      </div>
      <div class="imagenUser">
        <img src="<?= $file ?>">
      </div>
      <?php } ?>

      <!--  ************************************************************** -->
    <div class="container">
      <a href="index.php"><img src="images/logo-02.png" width="367" height="80" class="logo"></a>
    </div>
        <a href="#" class="toggle-nav">
  				<span class="ion-navicon-round"></span>
  			</a>
        <nav class="main-nav">
  				<ul>
  					<li><a href="productos.php">Productos</a></li>
  					<li><a href="preguntas.php">FAQs</a></li>
  					<li><a href="contacto.php">Contacto</a></li>
  				</ul>
  			</nav>
  		</header>

   <section class="main-section">
    <div class="container">


      <h2 style="text-align: center; font-weight: bold; color: #FFF;">El primer <span>E-COMMERCE </span> dedicado exclusivamente al comercio de impresoras, digitalizadores, repuestos e insumos.</h2>

      <h2 class="diezanios">10 años de experiencia en el mercado, otorgan seguridad y confianza.</h2>

 <form action="" method="get" class="buscar">

 <input type="text" name="buscar" class="input-buscar" placeholder="Ingrese su búsqueda..."/>

 <input name="busqueda" type="submit" value="Buscar">

 </form>

	 </div>
   </section>

   <section class="about-section">
    <div class="container">
    <img src="images/printers-01.png" width="1171" height="431" class="img-responsive">
<p>Posicionada en la ciudad autónoma de Buenos Aires, <strong>CABACOPIER</strong>, es una empresa argentina orientada a brindar soluciones de manejo de documentos, tanto en impresión, digitalización, reproducción y finalización de documentos. <strong>CABACOPIER</strong>, distribuidor oficial de las principales marcas de fotocopiadoras del mercado: <strong>Canon, Xerox y Ricoh</strong> ofrece además, una amplia gama de insumos, repuestos y software. También contamos con un grupo de trabajo formado por profesionales del rubro de la impresión que les brindarán un amplio conocimiento y soporte en sus proyectos tanto personales como empresariales.</p>

      <h2>Visión:</h2>
      <p>Ser el mayor proveedor de equipos de impresión, repuestos e insumos de la ciudad de Buenos Aires.</p>

      <h2>Misión:</h2>
      <p>Seguir proveyendo equipos y repuestos de la más alta calidad, cuidando siempre el medio ambiente.
      Crear un ambiente de trabajo estimulante, creativo y agradable; para la participación y desempeño del personal, dentro de un marco apropiado.</p>

      <h2>Valores:</h2>
      <p>Estos valores fundamentales definen nuestra identidad y conducta:</p>

      <ul>

          <li><h3>Ética comercial:</h3> Quienes trabajamos en CABACOPIER. tenemos el compromiso de cumplir con las más altas normas de conducta comercial en nuestras relaciones con nuestros compañeros, clientes y proveedores.</li>

          <li><h3>Compromiso:</h3> Concebimos una gestión basada en la mejora continua, estimulando la integración, el esfuerzo y la contribución de toda la compañía.</li>

          <li><h3>Confianza:</h3> Construimos relaciones basadas en el respeto personal y profesional, brindando respaldo y seguridad a todos nuestros clientes.</li>

          <li><h3>Cuidado del medio ambiente:</h3> Promover la responsabilidad medio ambiental en todos los niveles tanto dentro de la compañía como fuera de ella.
          </li>
      </ul>
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
 <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        $('.toggle-nav').click(function(){
            $('.main-nav ul').slideToggle('medium')
        })
    </script>
  </body>
</html>
