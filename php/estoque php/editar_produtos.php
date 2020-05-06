<?php

require_once '../server php/db_connect.php';

include_once 'header.php';

if(isset($_GET['codigo'])):
  $codigo = mysqli_escape_string($connect, $_GET['codigo']);

  $sql = "SELECT * FROM item WHERE codigo = '$codigo'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
endif;
?>


<form action="update.php" method="POST">
  <div class="form-row">
  <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Nome do Produto</label>
      <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Quantidade</label>
      <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php echo $dados['quantidade'];?>">
    </div>
  </div>
  <div class="form-group col-md-5">
    <label for="inputAddress">Fornecedor</label>
    <input type="text" class="form-control" name="fornecedor" id="fornecedor" value="<?php echo $dados['fornecedor'];?>">
  </div>
  <div class="form-group col-md-5">
    <label for="inputAddress2">Válido até</label>
    <input type="text" class="form-control" name="validade" id="validade" placeholder="00/00/0000" value="<?php echo $dados['validade'];?>">
  </div>

  <button type="submit" name="btn-editarProdutos" class="btn btn-primary"> Atualizar </button>
</form>



<?php
include_once 'footer.php'
?>