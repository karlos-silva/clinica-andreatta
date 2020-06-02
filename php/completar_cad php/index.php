<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}
require_once '../server php/db_connect.php';
include_once 'header.php';
include_once 'footer.php'
?>

<div class="login-content">
			<form method="POST">
				<img src="../../img/avatar.svg">
				<h2 class="title">Complete seu cadastro!</h2>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Rua</h5>
           		   		<input type="text" class="input" name="rua" >
           		   </div>
           		</div>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Numero</h5>
           		   		<input type="text" class="input" name="numero" >
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Bairro</h5>
           		   		<input type="text" class="input" name="bairro" >
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Complemento</h5>
           		    	<input type="text" class="input" name="secomplementonha">
            	   </div>
            	</div>
            	<input name="submit" type="submit" class="btn" value="Cadastrar">
            </form>
        </div>
    </div>
	<?php 
	if(isset($_POST['submit'])){
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$complemento = $_POST['complemento'];
		$codigo = $_SESSION['codigo'];
		$sql = "UPDATE usuario SET rua = '$rua' WHERE codigo = '$codigo'";
		mysqli_query($connect, $sql);
		$sql = "UPDATE usuario SET numero = '$numero' WHERE codigo = '$codigo'";
		mysqli_query($connect, $sql);
		$sql = "UPDATE usuario SET bairro = '$bairro' WHERE codigo = '$codigo'";
		mysqli_query($connect, $sql);
		$sql = "UPDATE usuario SET complemento = '$complemento' WHERE codigo = '$codigo'";
		mysqli_query($connect, $sql);
		$sql = "UPDATE usuario SET tipo = 'cliente2' WHERE codigo = '$codigo'";
		mysqli_query($connect, $sql);
		header('LOCATION: ../home_cliente php/home.php');
	}
	?>