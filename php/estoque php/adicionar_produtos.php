<?php
include_once 'header.php'
?>


<form action="create.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Nome do Produto</label>
      <input type="text" class="form-control" name="nome" id="nome">
    </div>
    <div class="form-group col-md-1">
      <label for="inputPassword4">Quantidade</label>
      <input type="text" class="form-control" name="quantidade" id="quantidade">
    </div>
  </div>
  <div class="form-group col-md-5">
    <label for="inputAddress">Fornecedor</label>
    <input type="text" class="form-control" name="fornecedor" id="fornecedor" >
  </div>
  <div class="form-group col-md-5">
    <label for="inputAddress2">Válido até</label>
    <input type="text" class="form-control" name="validade" id="validade" placeholder="00/00/0000">
  </div>

  <button type="submit" name="btn-adicionarProdutos" class="btn btn-primary"> Adicionar </button>
</form>



<?php
include_once 'footer.php'
?>