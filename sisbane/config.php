<?php
require_once 'messages.php';

define( 'BASE_PATH', 'https://sisbane.000webhostapp.com/sisbane/');//Ruta base donde se encuentra
define( 'DB_HOST', 'localhost' );//Servidor de la base de datos
define( 'DB_USERNAME', 'id2834744_sisbane');//Usuario de la base de datos
define( 'DB_PASSWORD', 'sisbane');//Contraseña de la base de datos
define( 'DB_NAME', 'id2834744_sisbane');//Nombre de la base de datos

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
