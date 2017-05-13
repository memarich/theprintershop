<?php

//  ------------------------ funciones.php --------------------------------


// Inicializar la variable SESSION
session_start();

// Se chequea si esta habilitado el recordame



if (isset($_COOKIE["idUser"])){
  $_SESSION["idUser"] = $_COOKIE["idUser"];
}



/* ----------------------------Funcion validar datos -------------------- */

function validarInformacion($data){

  $errores = [];

// Validacion del Nombre

  $nombres = trim($data["nombres"]);
  /* Con trim elimino caracteres en blanco adelante y atras palabra  */
  if (strlen($nombres) == 0){
    $errores["nombres"] = "Debe ingresar un nombre.";
  }

  // Validacion del apellido

    $apellido = trim($data["apellido"]);
    /* Con trim elimino caracteres en blanco adelante y atras palabra  */
    if (strlen($apellido) == 0){
      $errores["apellido"] = "Debe ingresar un apellido.";
    }

// Validacion del email

  $mail = trim($data["mail"]);
  if (strlen($mail) == 0){
    $errores["mail"] = "Debe ingresar un email.";
  }elseif (! filter_var($mail,FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "Debe ingresar un email válido.";
  }elseif (buscarPorEmail($mail) !== false) {
    $errores["mail"] = "El email ya existe.";
  }

  // Validacion del dni

    $dni = trim($data["dni"]);
    if (!is_numeric($dni)){
      $errores["dni"] = "Tu dni debe ser un número sin signos de puntuación.";
    }

    // Validacion del celular

      $celular = trim($data["celular"]);
      if (!is_numeric($celular)){
        $errores["celular"] = "Tu celular debe ser un número sin signos de puntuación.";
      }

      // Validacion de la calle

        $calle = trim($data["calle"]);
        /* Con trim elimino caracteres en blanco adelante y atras palabra  */
        if (strlen($calle) == 0){
          $errores["calle"] = "Debe ingresar un nombre de calle o avenida.";
        }

        // Validacion del numero de calle

          $numero = trim($data["numero"]);
          if (!is_numeric($numero)){
            $errores["numero"] = "Tu número de calle debe ser un número.";
          }

          // Validacion de la localidad

            $localidad = trim($data["localidad"]);
            /* Con trim elimino caracteres en blanco adelante y atras palabra  */
            if (strlen($localidad) == 0){
              $errores["localidad"] = "Debe ingresar una localidad.";
            }

            // Validacion de la provincia

              $provincia = trim($data["provincia"]);
              /* Con trim elimino caracteres en blanco adelante y atras palabra  */
              if (strlen($provincia) == 0){
                $errores["provincia"] = "Debe ingresar una provincia.";
              }

          // Validacion de la contraseña

            if ($data["pass"] == ""){
              $errores["pass"] = "Ingresa tu contraseña.";
            }

            if ($data["passc"] == ""){
              $errores["passc"] = "Confirma tu contraseña.";
            }

            if ($data["pass"] !== "" && $data["passc"] !== "" && $data["pass"] !== $data["passc"] ){
              $errores["pass"] ="Las dos contraseñas deben ser iguales.";
            }

  return $errores;
}

/* ----------------------------Funcion guardar imagen -------------------- */

function guardarImagen($unaImagen,$errores){

  if ($_FILES[$unaImagen]["error"] == UPLOAD_ERR_OK){
    $nombre = $_FILES[$unaImagen]["name"];
    $archivo = $_FILES[$unaImagen]["tmp_name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    if ($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
      $miArchivo = dirname(__FILE__);
      $miArchivo = $miArchivo."/imagenesUsuario/";
      $miArchivo = $miArchivo.$_POST["mail"].".".$ext;
      move_uploaded_file($archivo,$miArchivo);
    }else{
      $errores["imagen"] = "Subi una imagen válida.";
    }
  }else{
    $errores["imagen"] = "No se puede subir la imagen.";
  }
  return $errores;
}


/* ------------------  Funcion crear usuario  ------------------------------ */

function crearUsuario ($data){
  $usuario = [
    "nombres" => $data["nombres"],
    "apellido" => $data["apellido"],
    "mail" => $data["mail"],
    "dni" => $data["dni"],
    "celular" => $data["celular"],
    "calle" => $data["calle"],
    "numero" => $data["numero"],
    "piso" => $data["piso"],
    "departamento" => $data["departamento"],
    "codpos" => $data["codpos"],
    "localidad" => $data["localidad"],
    "provincia" => $data["provincia"],
    "pass" => password_hash($data["pass"],PASSWORD_DEFAULT)
  ];

  $usuario["id"] = traerNuevoId();

  return $usuario;
}

/* ------------------------Funcion Guardar usuario  ------------------------ */

function guardarUsuario($usuario){
  $json = json_encode($usuario);
  $json = $json . PHP_EOL;
  // PHP_EOL --> El símbolo 'Fin De Línea' correcto de la plataforma en uso.
  file_put_contents("usuario.json",$json,FILE_APPEND);
}

/* ------------------------  Funcion Traer Todo ---------------------------- */

function traerTodos(){
  // Leo el archivo usuarios.json
  $archivo = file_get_contents("usuario.json");

  // Lo divido por enters - PHP_EOL
  $usuariosJson = explode(PHP_EOL,$archivo);

  //  Quito el enter del final
  array_pop($usuariosJson);

  $usuariosFinal = [];

  // Cada linea la convierto de Json a Array
  foreach ($usuariosJson as $json) {
    $usuariosFinal[] = json_decode($json,true);
  }

  return $usuariosFinal;
}

/* --------------- Funcion traer nuevo ID  --------------------------------- */

function traerNuevoId(){
  $usuarios = traerTodos();

  if (count($usuarios) == 0){
    return 1;
  }

  $elUltimo = array_pop($usuarios);
  $id = $elUltimo["id"];

  return $id + 1;
}

/* ------------------ Buscar por email ------------------------------------- */

function buscarPorEmail($mail){
  $todos = traerTodos();

  foreach ($todos as $usuario) {
    if ($usuario["mail"] == $mail) {
      return $usuario;
    }
  }
  return false;
}
/* ------------------- Buscar por ID --------------------------------------- */

function buscarPorId($id){
  $todos = traerTodos();

  foreach ($todos as $usuario) {
    if ($usuario["id"] == $id) {
      return $usuario;
    }
  }
  return false;
}
/* -------------------------- Funcion loguear usuario ---------------------- */
function loguear($usuario){
  $_SESSION["idUser"] = $usuario["id"];
  echo "lo loguee";
}
/* ------------------------------------------------------------------------- */

/* ---------------------  Verifica si el usuario esta logueado ------------- */
function estaLogueado(){
  return isset($_SESSION["idUser"]);
}
/* ------------------------------------------------------------------------- */

/* ----------------------- Funcion validar Login --------------------------- */
function validarLogin($datos){
  $errores = [];
  // Valido el email -------------------------------------------------------
  $mail = trim($datos["mail"]);

  if (strlen($mail) == 0){
    $errores["mail"] = "Debe ingresar un email.";
  }elseif (! filter_var($mail,FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "Debe ingresar un email válido.";
  }elseif (buscarPorEmail($mail) == false) {
    $errores["mail"] = "No existe el usuario";
  } else {
    // El usuario existe
    $usuario = buscarPorEmail($mail);
    if (password_verify($datos["pass"],$usuario["pass"]) == false){
      $errores["mail"] = "Error de login";
    }
  }
  return $errores;
}
/* --------------------------- Logout -------------------------------------*/

function desLogueo(){
  session_destroy();
  setcookie("idUser","",-5);
  header("location:index.php");
}


/* -------------   Chequea si hay otro usuario para loguearse  ------------- */

function hayNuevoLogueo(){
  if ($_GET){
   if ($_GET["id"] != $_SESSION["idUser"]){
     desLogueo();
   }
  }
}
/* ------------------------------------------------------------------------- */

?>
