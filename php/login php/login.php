<?php

require_once '../server php/db_connect.php';

if(empty($_POST['email']) || empty($_POST['senha'])) {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = md5('$senha')";


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
			if ($array['tipo'] == "visitante" or $array['tipo'] == "cliente"){
				session_start();
				$_SESSION['codigo'] = $array['codigo'];
				header('Location: ../home_cliente php/home.php');
				exit();
			}
			if ($array['tipo']== "secretaria"){
				session_start();
				$_SESSION['codigo'] = $array['codigo'];
				header('Location: ../home_adm php/home.php');
				exit();
			}
			
		}else{
			header('Location: index.php');
		}
	}
}
?>