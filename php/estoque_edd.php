<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Editar o estoque</title>
  </head>
  <body>
  <?php require_once 'process.php';?>
    <div class="row justify-content-center">
      <form action="process.php" method="POST">
        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
        <div class="form-group">
          <label>Nome do Produto</label>
          <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>">
        </div>
        <div class="form-group">
          <label>Quantidade</label>
          <input type="text"name="quantidade" class="form-control" value="<?php echo $quantidade ?>">
        </div>
        <div class="form-group">
          <label>Fornecedor</label>
          <input type="text"name="fornecedor" class="form-control"value="<?php echo $fornecedor ?>">
        </div>
        <div class="form-group">
          <label>Validade</label>
          <input type="text"name="validade" class="form-control" value="<?php echo $validade ?>">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info" name="edd">Salvar</button>
        </div>
      </form>
    </div>
  </body>
</html>