<?php

//  ---------------------------- preguntas.php ------------------------------
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
	<link href="images/rgb.png" rel="shortcut icon">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  </head>

  <body>
    <div style="
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);">
    </div>
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
  					<li><a href="index.php">Home</a></li>
  					<li><a href="productos.php">Productos</a></li>
  					<li><a href="contacto.php">Contacto</a></li>
  				</ul>
  			</nav>
  		</header>

         <section class="questions-section">

<!-- Lo saque de aqui http://www.despegar.com.ar/help/ -->

      <h1>Preguntas frecuentes</h1>

      <article class="question-article">
        <h2>¿Cómo compro en la página de THE PRINTER SHOP?</h2>
        <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>
      </article>
      <article class="question-article">
        <h2>¿Cuáles son los medios de pago y financiación disponibles?</h2>
        <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>
      </article>
      <article class="question-article">
        <h2>Mi tarjeta de crédito fue rechazada al momento de la compra, ¿cómo sigo?</h2>
        <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>
      </article>
      <article class="question-article">
        <h2>No tengo tarjeta de crédito o no me alcanza el límite que tengo, ¿puedo usar otro medio de pago?</h2>
        <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>
      </article>
      <article class="question-article">
        <h2>¿Qué pasa si luego de la compra necesito modificarla o cancelarla?</h2>
        <p>El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.</p>
      </article>
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
