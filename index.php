<?php

require_once("config.php");
$sql =  new sql();

$banco = $sql->select("SELECT * FROM DB_USUARIO ORDER BY idusu");
$header = array();
foreach ($banco[0] as $key => $value ) {
	array_push($header, ucfirst($key));
}
echo implode("/", $header);

$file = fopen("usuario.csv", "w+");
fwrite($file, implode("/", $header));

?>
