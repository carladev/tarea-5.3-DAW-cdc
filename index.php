
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport">
  <title>Baloncesto</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>


<body>
  <div class="frm">
    <form class="form" name="imput" method="post" action="index.php">
      <h4 class="title">Inicio de sesión</h4>
      <?php if (isset($_GET['error']) && $_GET['error'] == 'true') : ?>
        <span>
          <p class="error">Usuario o contraseña incorrectos. Vuelva a intentarlo.</p>
        </span>
      <?php endif; ?>
      <div class="inputContainer">
        <label class="label" for="usuario">Usuario</label>
        <input class="input" type="text" name="usuario" required autofocus>
      </div>
      <div class="inputContainer">
        <label class="label" for="pass">Contraseña</label>
        <input class="input" type="text" name="pass" required>
      </div>
      <input class="submitBtn" type="submit" value="Enviar" name="enviar" />
    </form>
  </div>
</body>
<?php

/**
* @package Baloncesto
*/
 
/**
* Incluye el archivo de conexión a la base de datos.
*/
include 'conexionBD.php';


if (isset($_POST['enviar'])) {
    
/**
* Conexión a la base de datos.
* @var mysqli $con
*/
  $con = openCon();
  
/**
* Obtenemos los campos del formulario de login.
* @var string $usuario
* @var string $pass
*/
  $usuario =  $_POST['usuario'];
  $pass = $_POST['pass'];

/**
* Iniciamos la sesión.
* @var Session $session
*/
  session_start();

/**
* Consultar la base de datos para comprobar si las credenciales del usuario son válidas.
* @var mysqli_result $resultado
*/
  $resultado = $con->query("SELECT usuario, pass FROM usuarios WHERE usuario ='$usuario' AND pass= '$pass';");
  $res = $resultado->fetch();

/**
* Si las credenciales del usuario son válidas, inicia una sesión y redirige al usuario a la página del menú.
* En caso contrario, redirigir al usuario de nuevo a la página de inicio de sesión con un mensaje de error.
*/
if ($res != null) {
/**
 * Guardar las credenciales de usuario en la sesión.
*/
$_SESSION['usuario'] = $res['usuario'];
$_SESSION['pass'] = $res['pass'];
/**
 * Redirige al usuario a la página del menú.
 */
    header("location:menu.php?");
  } else {
/**
* Redirige al usuario de vuelta a la página de inicio de sesión con un mensaje de error.
*/
    header("location: index.php?error=true");
  }
}
?>

</html>