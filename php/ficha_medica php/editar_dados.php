<?php

require_once '../server php/db_connect.php';

include_once 'header.php';

if(isset($_GET['codigo'])):
  $codigo = mysqli_escape_string($connect, $_GET['codigo']);

  $sql = "SELECT * FROM cliente WHERE codigo = '$codigo'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
endif;
?>


<form action="update.php" method="POST">
  <div class="form-row">
  <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Tipo Sanguíneo:</label>
      <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dados['tipo-sanguineo'];?>">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Grau de miopia:</label>
      <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php echo $dados['grau-miopia'];?>">
    </div>
  </div>
  <div class="form-group col-md-5">
    <label for="inputAddress">Alergias: </label>
    <input type="text" class="form-control" name="fornecedor" id="fornecedor" value="<?php echo $dados['alergias'];?>">
  </div>

  <button type="submit" name="btn-editarProdutos" class="btn btn-primary"> Atualizar </button>
</form>



<?php
include_once 'footer.php'
?>