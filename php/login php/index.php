<?php
session_start();

include_once 'header.php';
?>
	<img class="wave" src="../../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../../img/background-login.svg">
		</div>
		<?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Email ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
		<div class="login-content">
			<form action="login.php" method="POST">
				<img src="../../img/avatar.svg">
				<h2 class="title">Bem Vindo!</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name="email" >
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Senha</h5>
           		    	<input type="password" class="input" name="senha">
            	   </div>
            	</div>
            	<a href="cadastro.php">Cadastre-se</a>
            	<input type="submit" class="btn" value="Entrar">
            </form>
        </div>
    </div>
<?php
include_once 'footer.php';
?>