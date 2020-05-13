<?php

session_start();

require_once '../server php/db_connect.php';

function clear($input) {
  global $connect;
  // sql injection
  $var = mysqli_escape_string($connect, $input);
  // sql xss
  $var = htmlspecialchars($var);
  return $var;

}

$nome = clear(trim($_POST['nome']));
$sobrenome = clear(trim($_POST['sobrenome']));
$email = clear(trim($_POST['email']));
$senha = clear(trim(md5($_POST['senha'])));


$sql = "SELECT count(*) AS total FROM usuário WHERE email = '$email'";
$resultado = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($resultaddo);

if($row['total'] == 1) {
  $_SESSION['usuario_existe'] = true;
  header('Location: cadastro.php');
  exit;
}

$sql = "INSERT INTO usuário (nome, sobrenome, email, senha, data_cadastro) VALUES ('$nome', '$sobrenome', '$email', '$senha', NOW())";
$resultado = mysqli_query($connect, $sql);

if($resultado === TRUE) {
  $_SESSION['status_cadastro'] = true;
}

$connect->close();

header('Location: cadastro.php');
exit;

?>
