<?php
$mysqli = new mysqli('localhost','root','','clinica_andreatta') or die (mysqli_error($mysqli));
if (isset($_POST['add'])){
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];
    $validade = $_POST['validade'];

    $mysqli->query("INSERT INTO item (quantidade,nome,fornecedor,validade) VALUES($quantidade,'$nome','$fornecedor','$validade')") or 
    die($mysqli->error);
    header('Location: estoque.php');
}

if (isset($_GET['deletar'])){
    $codigo = $_GET['deletar'];
    $mysqli->query("DELETE FROM item WHERE codigo=$codigo") or die ($mysqli->error());
    header('Location: estoque.php');
}

if (isset($_GET['editar'])){
    $codigo = $_GET['editar'];
    $result = $mysqli->query("SELECT * FROM item WHERE codigo=$codigo") or die ($mysqli->error());
    $row = $result->fetch_array();
    $nome = $row['nome'];
    $quantidade = $row['quantidade'];
    $fornecedor = $row['fornecedor'];
    $validade = $row['validade'];
    header('Location: estoque_edd.php');
}

if (isset($_POST['edd'])){
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];
    $validade = $_POST['validade'];
    $mysqli->query("UPDATE item SET nome='$nome', quantidade ='$quantidade', fornecedor ='$fornecedor', validade ='$validade' WHERE codigo=$codigo")  or 
    die($mysqli->error);
};


