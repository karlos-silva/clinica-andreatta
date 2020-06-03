<?php
include_once 'header.php'
?>

<div class="container">
  <form action="create.php" method="POST">
    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="nome" id="nome">
        <label for="nome">Nome do Produto</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="quantidade" id="quantidade">
        <label for="quantidade">Quantidade</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="fornecedor" id="fornecedor">
        <label for="fornecedor">Fornecedor</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="validade" id="validade">
        <label for="validade">Válido até</label>
      </div>
    </div>
    <button type="submit" name="btn-adicionarProdutos" class="btn btn-pesquisar"> Adicionar </button>
  </form>
</div>



<?php
include_once 'footer.php'
?>