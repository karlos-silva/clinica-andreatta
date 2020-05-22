<?php

session_start();

require_once '../server php/db_connect.php';

if(empty($_POST['nome']) || empty($_POST['sobrenome']) || empty($_POST['email']) || empty($_POST['senha'])) {
  $_SESSION['inf_incompletas'] = true;
	header('Location: cadastro.php');
	exit();
}


function clear($input) {
  global $connect;
  // sql injection
  $var = mysqli_escape_string($connect, $input);
  // sql xss
  $var = htmlspecialchars($var);
  return $var;

}
if(isset($_POST['nome'])){
$nome = clear(trim($_POST['nome']));
$sobrenome = clear(trim($_POST['sobrenome']));
$email = clear(trim($_POST['email']));
$senha = clear(trim(md5($_POST['senha'])));



$sql = "SELECT codigo FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($connect, $sql);
$row = mysqli_num_rows($resultado);

if($row > 0) {
  $_SESSION['usuario_existe'] = true;
  header('Location: cadastro.php');
  exit();
}else{
  $sql = "INSERT INTO usuario (nome, sobrenome, email, senha, data_cadastro, tipo) VALUES ('$nome', '$sobrenome', '$email', '$senha', NOW(),'secretaria')";
  $resultado = mysqli_query($connect, $sql);

  if($resultado === TRUE) {
  $_SESSION['status_cadastro'] = true;
  }

  $connect->close();

  header('Location: cadastro.php');
  exit;
}
}
?>
