<?php

session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}


require_once '../server php/db_connect.php';

if(isset($_POST['btn-editarProdutos'])):

  $codigoSec = $_SESSION['codigo'];
  $nomeProduto = mysqli_escape_string($connect, $_POST['nome']);
  $quantidadeProduto = mysqli_escape_string($connect, $_POST['quantidade']);
  $fornecedor = mysqli_escape_string($connect, $_POST['fornecedor']);
  $validade = mysqli_escape_string($connect, $_POST['validade']);
  $codigo = mysqli_escape_string($connect, $_POST['codigo']);

  $sql = "UPDATE item SET nome = '$nomeProduto', quantidade = '$quantidadeProduto', fornecedor = '$fornecedor', validade = '$validade',usuario_codigo = '$codigoSec' WHERE codigo = '$codigo'";

  if(mysqli_query($connect, $sql)):
    $_SESSION['mensagem'] = "Produto Atualizado com sucesso!";
    header('Location: estoque.php?');
  else:
    $_SESSION['mensagem'] = "Erro ao Atualizar!";
    header('Location: estoque.php?');
  endif;
endif;