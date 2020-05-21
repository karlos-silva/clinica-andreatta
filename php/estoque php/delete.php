<?php

session_start();

require_once '../server php/db_connect.php';

if(isset($_POST['btn-deletar'])):

  $codigo = mysqli_escape_string($connect, $_POST['codigo']);

  $sql = "UPDATE  item SET estatus = '1' WHERE codigo = '$codigo'";

  if(mysqli_query($connect, $sql)):
    $_SESSION['mensagem'] = "Produto Deletado com sucesso!";
    header('Location: estoque.php?');
  else:
    $_SESSION['mensagem'] = "Erro ao Deletar!";
    header('Location: estoque.php?');
  endif;
endif;