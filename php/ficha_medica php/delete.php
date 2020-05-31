<?php

session_start();

require_once '../server php/db_connect.php';

if(isset($_POST['btn-deletar'])):

  $codigo = mysqli_escape_string($connect, $_POST['codigo']);

  $sql = "DELETE FROM `fichamedica` WHERE `fichamedica`.`codigo` = '$codigo'";

  if(mysqli_query($connect, $sql)):
    $_SESSION['mensagem'] = "Ficha deletada com sucesso!";
    header('Location: index.php?');
  else:
    $_SESSION['mensagem'] = "Erro ao Deletar!";
    header('Location: index.php?');
  endif;
endif;