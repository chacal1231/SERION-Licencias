<?
//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["auten"] != "SI" OR $_SESSION['priv']!="0"){
//si no existe, va a la página de autenticacion
header("Location: ../index.php");
//salimos de este script
exit();
}
?>
