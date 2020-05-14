<?php
session_start();
require_once '../server php/db_connect.php';

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT email FROM usuario WHERE email = '$email' AND senha = md5('$senha')";


$resultado = mysqli_query($connect, $sql);

$row = mysqli_num_rows($resultado);

echo $row;
print_r($row);


if($row == 0) {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
} else{
	
	while($array = mysqli_fetch_array($resultado)){
		if($email == $array['email']){
			session_start();
			$_SESSION['email'] = $email;
			header('Location: ../home php/home.php');
			exit();
		}else{
			header('Location: index.php');
		}
	}
}
?>