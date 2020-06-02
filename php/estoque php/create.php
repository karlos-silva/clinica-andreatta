<?php

session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}

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

  $codigo = $_SESSION['codigo'];
  $nomeProduto = clear($_POST['nome']);
  $quantidadeProduto = clear($_POST['quantidade']);
  $fornecedor = clear( $_POST['fornecedor']);
  $validade = clear( $_POST['validade']);

  $sql = "INSERT INTO item (nome, quantidade, fornecedor, validade,usuario_codigo) VALUES ('$nomeProduto', '$quantidadeProduto', '$fornecedor', '$validade', '$codigo')";

  if(mysqli_query($connect, $sql)):
    $_SESSION['mensagem'] = "Produto Cadastrado com sucesso!";
    header('Location: estoque.php?');
  else:
    $_SESSION['mensagem'] = "Erro ao cadastrar!";
    header('Location: estoque.php?');
  endif;
endif;