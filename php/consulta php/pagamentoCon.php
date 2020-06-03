<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}
require_once '../server php/db_connect.php';
include_once 'header.php';
include_once 'footer.php'
?>
<div class="container">
<h5>Valor: R$ 100,00</h5>
  <form method="POST">
    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="nome" id="nome">
        <label for="nome">Nome Completo</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="codigo" id="codigo">
        <label for="quantidade">Codigo do Cartao</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="validade" id="validade">
        <label for="fornecedor">Data de validade</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="cvc" id="cvc">
        <label for="validade">CVC</label>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary"> Efetuar Pagamento </button>
  </form>
</div>
<?php

if(isset($_POST['submit'])){
    $codigo = $_SESSION['codigo'];
    $sql = "INSERT INTO `pagamento` (`valor`, `usuario_codigo`) VALUES ('100', '$codigo')";
    mysqli_query($connect, $sql);
    header('LOCATION: ../agenda_cliente php/index.php');
}

?>