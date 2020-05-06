<?php

session_start();

require_once '../server php/db_connect.php';

function clear($input) {
  global $connect;
  // sql injection
  $var = mysqli_escape_string($connect, $input);
  // sql xss
  $var = htmlspecialchars($var);
  return $var;

}

if(isset($_POST['btn-adicionarProdutos'])):

  $nomeProduto = clear($_POST['nome']);
  $quantidadeProduto = clear($_POST['quantidade']);
  $fornecedor = clear( $_POST['fornecedor']);
  $validade = clear( $_POST['validade']);

  $sql = "INSERT INTO item (nome, quantidade, fornecedor, validade) VALUES ('$nomeProduto', '$quantidadeProduto', '$fornecedor', '$validade')";

  if(mysqli_query($connect, $sql)):
    $_SESSION['mensagem'] = "Produto Cadastrado com sucesso!";
    header('Location: estoque.php?');
  else:
    $_SESSION['mensagem'] = "Erro ao cadastrar!";
    header('Location: estoque.php?');
  endif;
endif;