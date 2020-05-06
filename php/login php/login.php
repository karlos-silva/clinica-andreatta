<?php
session_start();
require_once '../server php/db_connect.php';

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$sql = "SELECT email FROM usuário WHERE email = '$email' AND senha = md5('$senha')";


$resultado = mysqli_query($conexao, $sql);

$row = mysqli_num_rows($resultado);

if($row == 0) {
	$_SESSION['email'] = $email;
	header('Location: ../home php/home.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
?>