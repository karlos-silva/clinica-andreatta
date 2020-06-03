<?php
session_start();
include_once 'header.php';
?>
	<img class="wave" src="../../img/wave-register.png">
	<div class="container">
		<div class="img">
			<img src="../../img/register.svg">
        </div>
        <?php
						if(isset($_SESSION['inf_incompletas'])):
							echo '<script type="text/javascript">';
              echo ' alert("Informações incompletas")';
              echo '</script>';
				?>
				
        <?php
        endif;
        unset($_SESSION['inf_incompletas']);
        ?>
        <?php
						if(isset($_SESSION['status_cadastro'])):
				?>
				  <div class="alerta sucesso">
            <p>Cadastro efetuado!</p>
            <p>Faça login informando o seu usuário e senha <a href="../../php/login php/index.php">aqui</a></p>
        </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
        <?php
						if(isset($_SESSION['usuario_existe'])):
							echo '<script type="text/javascript">';
              echo ' alert("O usuário escolhido já existe. Informe outro e tente novamente.")';
              echo '</script>';
        ?>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>


		<div class="login-content">
			<form action="cadastrar.php" method="POST">
				<img src="../../img/avatar.svg">
				<h2 class="title">cadastro</h2>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nome</h5>
           		   		<input type="text" class="input" name="nome" >
           		   </div>
           		</div>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Sobrenome</h5>
           		   		<input type="text" class="input" name="sobrenome" >
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" class="input" name="email" >
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Senha</h5>
           		    	<input type="password" class="input" name="senha" maxlength="32">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Cadastrar">
            </form>
        </div>
    </div>
<?php
include_once 'footer.php';
?>