<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "clinica_andreatta";

$connect = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($connect, "utf8");


if(mysqli_connect_error()):
  echo "Erro na conexão:".mysqli_connect_error();
endif;

?>
