<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):

  $codigo = mysqli_escape_string($connect, $_POST['codigo']);

  $sql = "DELETE FROM item WHERE codigo = '$codigo'";

  if(mysqli_query($connect, $sql)):
    $_SESSION['mensagem'] = "Produto Deletado com sucesso!";
    header('Location: estoque.php?');
  else:
    $_SESSION['mensagem'] = "Erro ao Deletar!";
    header('Location: estoque.php?');
  endif;
endif;