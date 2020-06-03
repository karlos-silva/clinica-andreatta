<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
   
}
require_once '../server php/db_connect.php';
include_once 'header.php';
include_once 'footer.php';
?>
<form action="" method="POST">
    <div class="container">
        <select name="nome-escolhido">
        <label for="exampleFormControlTextarea1" >Nome paciente</label>
                <?php
         $sql = "SELECT * FROM usuario WHERE tipo = 'cliente1' OR tipo = 'cliente2' ";
         $resultado = mysqli_query($connect, $sql);
   
           while($dados = mysqli_fetch_array($resultado)){
                 $nome = $dados['nome'];
                 $sobrenome = $dados['sobrenome'];
                 $completo = $nome. ' '.$sobrenome;
                 echo "<option name = 'conteudo' value = '$completo'> $completo</option>";
           }
           
                ?>
                
        </select>       
    
            <div class="form-group">
                <h6 class="receita">Receita médica</h6>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="receita" rows="3"></textarea>
                <button type="submit" name="submit" class="btn btn-primary btn-add"> Adicionar </button>
            </div>
            
    </form>
</div>

<?php
 if(isset($_POST['submit'])){
    $nome_escolhido = $_POST['nome-escolhido'];
    $pedaco = explode(" ", $nome_escolhido);
    $nome = $pedaco[0];
    $sobrenome = $pedaco[1];
    $sql = "SELECT * FROM usuario WHERE nome = '$nome' AND sobrenome = '$sobrenome'";
    $result = mysqli_query($connect, $sql);
    $info = mysqli_fetch_array($result); 
    $codigo = $info['codigo'];
    $receita = $_POST['receita'];
    $sql = "INSERT INTO receita (informacoes, usuario_codigo) VALUES ('$receita', '$codigo')";

    mysqli_query($connect, $sql);
}

?>