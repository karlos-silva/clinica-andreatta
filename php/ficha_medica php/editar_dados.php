<?php

require_once '../server php/db_connect.php';

include_once 'header.php';

if(isset($_GET['codigo'])):
  $codigo = mysqli_escape_string($connect, $_GET['codigo']);

  $sql = "SELECT * FROM fichamedica WHERE codigo = '$codigo'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
endif;
?>

 
<div class="container">
  <form method="POST">
  <div class="row">
      <div class="input-field input-add">
        <label for="Nome">Nome</label>
        <input type="text" name="nome" value="<?php echo $dados['nome'];?>">
        
      </div>
    </div>

  <div class="row">
      <div class="input-field input-add">
        <label for="tipo-sanguineo">Grau</label>
        <input type="text" name="grau" value="<?php echo $dados['grau'];?>">
       
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <label for="tipo-sanguineo">Deficiência visual </label>
        <input type="text" name="def_visual" value="<?php echo $dados['def_visual'];?>">
        
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <label for="tipo-sanguineo">Tipo Sanguineo</label>
        <input type="text" name="tipo_sanguineo" value="<?php echo $dados['tipo_sanguineo'];?>">
        
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <label for="alergias">Alergias</label>
        <input type="text" name="alergia" value="<?php echo $dados['alergia'];?>">
       
      </div>
      <button type="submit" name="submit" class="btn btn-edit"> Atualizar </button>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <label for="Observacoes">Observações</label>
        <textarea type="text" name="obs"><?php echo $dados['obs'];?>"</textarea>>
        
        
      </div>
    </div>
    
    
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
    $sql ="UPDATE fichamedica SET nome = '$nome', grau = '$grau', def_visual = '$def_visual', tipo_sanguineo = '$tipo_sanguineo', alergia = '$alergia', obs = '$obs' WHERE codigo = '$codigo'";
    mysqli_query($connect, $sql);
    header('Location: index.php');
}


include_once 'footer.php'
?>