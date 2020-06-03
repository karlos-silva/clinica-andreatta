<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}
require_once '../server php/db_connect.php';
$sql = "SELECT * FROM horarios WHERE estatus = 0";
$resultado = mysqli_query($connect, $sql);
include_once 'header.php';
include_once 'footer.php';
?>
<div class="container">
<form method="POST">
<h6>Escolha uma data/hora disponivel</h6>
<select name="Vagas" id="Vagas">
    <option>-</option>
    <?php while($row = mysqli_fetch_array($resultado)):;?>
    <option><?php echo $row[0];?></option>
    <?php endwhile;?>
</select>
<h6>Possui algum plano de saude?</h6>
<select name="Consorcio" id="Consorcio">
    <option>Nenhum</option>
    <option>Unimed</option>
    <option>Amil</option>
    <option>NotreDame</option>
    <option>Sul America</option>
    <option>Bradesco Saude</option>
    <option>Golden Cross</option>
</select>
<h6>Como ira efetuar o pagamento?</h6>
<select name="pag" id="pag">
    <option>-</option>
    <option>Presencial</option>
    <option>Boleto</option>
    <option>Cartao</option>
</select>
<input type="submit" name="submit" value="Marcar" class="btn btn-pesquisar ">
</form>
</div>
<?php 
if(isset($_POST['submit'])){
    $selecionar = $_POST['Vagas']; 
    $pagamento = $_POST['pag'];
    $consorcio = $_POST['Consorcio'];
    $codigo = $_SESSION['codigo'];
    $sql = "SELECT * FROM usuario WHERE codigo = '$codigo'";
    $result = mysqli_query($connect, $sql);
    $info = mysqli_fetch_array($result);
    $nome = $info['nome'];
    $sobrenome = $info['sobrenome'];
    $completo = $nome . ' ' . $sobrenome;
    if ($selecionar != "-"){
        
            if ($pagamento == "Boleto" or $pagamento == "Presencial"){
                $sql = "UPDATE horarios SET estatus = '1' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET consorcio = '$consorcio' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET forma_pagamento = '$pagamento' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET usuario_codigo = '$codigo' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET nome = '$completo' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                header('LOCATION: ../agenda_cliente/index.php');
            }
            if ($pagamento == "Cartao" and $consorcio == "Nenhum"){
                $sql = "UPDATE horarios SET estatus = '1' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET consorcio = '$consorcio' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET forma_pagamento = '$pagamento' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET usuario_codigo = '$codigo' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET nome = '$completo' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET pago = '1' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                header('LOCATION: pagamento.php');
            }
            if ($pagamento == "Cartao" and $consorcio != "Nenhum"){
                $sql = "UPDATE horarios SET estatus = '1' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET consorcio = '$consorcio' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET forma_pagamento = '$pagamento' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET usuario_codigo = '$codigo' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET nome = '$completo' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET pago = '1' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                header('LOCATION: pagamentoCon.php');
            }
            else{  
                echo '<script type="text/javascript">';
                echo ' alert("Favor preencher forma de pagamento")';
                echo '</script>';
            }
        }
        else{  
            echo '<script type="text/javascript">';
            echo ' alert("Favor preencher data/hora")';
            echo '</script>';
        }
    }
?>
