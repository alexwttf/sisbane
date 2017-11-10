<?php
require_once 'config.php';
$db = new Cl_DBclass();

if(isset($_POST['idfacebook'])){
$idfacebook = $_POST['idfacebook'];
$query = "SELECT * FROM baneados where id_facebook = '$idfacebook' ";
$result = mysqli_query($db->con, $query);
$fila = mysqli_num_rows($resultado);

if ($fila=0){
	echo  1;
}
else{
	echo 0;
}
exit;
}