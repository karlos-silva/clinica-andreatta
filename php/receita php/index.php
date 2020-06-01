<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
   
}
require_once '../server php/db_connect.php';
include_once 'header.php';
include_once 'footer.php';
?>

<div class="container">
    <select name="select-nome">
            <option value="Escolha">Escolha um paciente</option>
            <?php
            
            $sql = "SELECT * FROM usuario WHERE tipo = 'visitante' ";
            $resultado = mysqli_query($connect, $sql);
            while($dados = mysqli_fetch_array($resultado)){
                
                $nome = $dados['nome'];
                echo "<option name = 'nome' value='{$nome}'>{$nome}</option>";
                var_dump($nome);
            }
            ?>
    </select>       
</div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1" >Receita médica</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="receita" rows="3"></textarea>
    </div>
    </form>
</div>

<?php
    $receita = $_POST['receita'];
    $sql = "INSERT INTO receita (informacoes) VALUES ('$receita')";
    mysqli_query($connect, $sql);

?>