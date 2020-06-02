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
        <select name="select-nome">
        <label for="exampleFormControlTextarea1" >Nome paciente</label>
                <?php
         $sql = "SELECT * FROM usuario WHERE tipo = 'visitante' ";
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
                <label for="exampleFormControlTextarea1" >Receita médica</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="receita" rows="3"></textarea>
                <button type="submit" name="submit" class="btn btn-primary btn-add"> Adicionar </button>
            </div>
            
    </form>
</div>

<?php
 if(isset($_POST['submit'])){
    $receita = $_POST['receita'];
    $sql = "INSERT INTO receita (informacoes) VALUE ('Banana')";
    mysqli_query($connect, $sql);
}

?>