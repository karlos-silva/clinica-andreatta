<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}
require_once '../server php/db_connect.php';
include_once 'header.php';
include_once 'footer.php';

$codigo = $_SESSION['codigo'];
$sql = "SELECT * FROM usuario WHERE codigo = '$codigo'";
$result = mysqli_query($connect, $sql);
$info = mysqli_fetch_array($result);
$tipo = $info['tipo'];
if($tipo == "cliente2"){

    echo '<form action="" method="POST">';
    echo '<div class="container">';
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlTextarea1" >FeedBack</label>';
    echo '<textarea class="form-control" id="exampleFormControlTextarea1" name="feed" rows="3"></textarea>';
    echo '<button type="submit" name="submit" class="btn btn-primary btn-add"> Adicionar </button>';
    echo '</div>';
    echo '</form>';
    echo '</div>';

}
else{
    echo '<div class="empty">';
    echo '<h6>É nescessario ja ter feito alguma consulta para dar feedback"</h6>';
    echo '</div>';
}

if(isset($_POST['submit'])){

    $completo = $info['nome'] . ' ' . $info['sobrenome'];
    $feed = $_POST['feed'];
    $sql = "INSERT INTO `feedback` (`usuario_codigo`, `info`, `nome`) VALUES ('$codigo', '$feed', '$completo')";
    mysqli_query($connect, $sql);
}
?>
