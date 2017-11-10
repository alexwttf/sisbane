<?php
//Archivo de conexión a la base de datos
require('include/conexion.php');
//Variable de búsqueda


//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");

//Comprueba si $consultaBusqueda está seteado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
$consultaBusqueda = $_POST['valorBusqueda'];

echo $consultaBusqueda;

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>