<?php
session_start();
require_once '../server php/db_connect.php';
$sql = "SELECT * FROM horarios WHERE estatus = 0";
$resultado = mysqli_query($connect, $sql);
include_once 'header.php';
include_once 'footer.php'
?>
<div class="container">
<form method="POST">
<h5>Escolha uma data/hora disponivel</h5>
<select name="Vagas" id="Vagas">
    <option>-</option>
    <?php while($row = mysqli_fetch_array($resultado)):;?>
    <option><?php echo $row[0];?></option>
    <?php endwhile;?>
</select>
<h5>Possui algum plano de saude?</h5>
<select name="Consorcio" id="Consorcio">
    <option>Nenhum</option>
    <option>Unimed</option>
    <option>Amil</option>
    <option>NoteDame</option>
    <option>Sul America</option>
    <option>Bradesco Saude</option>
    <option>Golden Cross</option>
</select>
<h5>Como ira efetuar o pagamento?</h5>
<select name="pag" id="pag">
    <option>-</option>
    <option>Presencial</option>
    <option>Boleto</option>
    <option>Cartao</option>
</select>
<input type="submit" name="submit" value="Marcar" class="btn btn-info ">
</form>
</div>
<?php 
if(isset($_POST['submit'])){
    $selecionar = $_POST['Vagas']; 
    $pagamento = $_POST['pag'];
    $consorcio = $_POST['Consorcio'];
    if ($selecionar != "-"){
            if ($pagamento != "-"){
                $sql = "UPDATE horarios SET estatus = '1' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET consorcio = '$consorcio' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
                $sql = "UPDATE horarios SET forma_pagamento = '$pagamento' WHERE info = '$selecionar'";
                mysqli_query($connect, $sql);
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
