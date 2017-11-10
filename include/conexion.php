<?php
function getConnexion()
{
	$mysqli= new mysqli('localhost', 'id2834744_sisbane', 'sisbane', 'id2834744_sisbane');
	if($mysqli ->connect_errno) exit('CONEXION FALLIDA :V '. $mysqli ->connect_errno);
	$mysqli ->set_charset('utf-8');
	return $mysqli;
}
?>
