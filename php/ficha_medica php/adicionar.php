<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}
include_once 'header.php';
require_once '../server php/db_connect.php';
include_once 'footer.php';
?>

olá
<div class="row">
    <div class="input-field input-add">
        <label for="Nome paciente">Nome do Paciente</label>
        <select name="select-nome" >
              <option value="Escolha">Escolha um paciente</option>
              <?php
              $sql = "SELECT * FROM usuario WHERE tipo = 'visitante' ";
              $resultado = mysqli_query($connect, $sql);
              while($dados = mysqli_fetch_array($resultado)){
                    $nome = $dados['nome'];
                    echo "<option name = 'nome' value = '$nome'> $nome</option>";
              }
                ?>
        </select> 
    </div>      
</div>

    
  <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="grau">
        <label for="tipo-sanguineo">Grau</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="def_visual">
        <label for="tipo-sanguineo">Deficiência visual </label>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="tipo_sanguineo" >
        <label for="tipo-sanguineo">Tipo Sanguineo</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="alergia" >
        <label for="alergias">Alergias</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <textarea class="form-control" name="obs" ></textarea>
        <label for="Observacoes">Observações</label>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary"> Adicionar </button>
  </form>
</div>



<?php
if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $grau = $_POST['grau'];
    $def_visual = $_POST['def_visual'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];
    $alergia = $_POST['alergia'];
    $obs = $_POST['obs'];
    $sql = "INSERT INTO fichamedica (nome ,grau ,def_visual ,tipo_sanguineo ,alergia ,obs) VALUES ('$nome','$grau' ,'$def_visual' ,'$tipo_sanguineo' ,'$alergia', '$obs')";
    mysqli_query($connect, $sql);
    header('Location: index.php');
  
}

?>