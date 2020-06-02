<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}
include_once 'header.php';
require_once '../server php/db_connect.php';
include_once 'footer.php';
?>

<div class="container">
  <form method="POST">
  <div class="dados-adicionar">
    <div class="row">
      <p for="Nome paciente" class="text-add">Nome do Paciente</p>
      <select name="nome-escolhido" >
            
      <?php
       $sql = "SELECT * FROM usuario WHERE tipo = 'visitante' ";
      $resultado = mysqli_query($connect, $sql);
      var_dump($resultado);

        while($dados = mysqli_fetch_array($resultado)){
              $nome = $dados['nome'];
              $sobrenome = $dados['sobrenome'];
              $completo = $nome.' '.$sobrenome;
              echo "<option name = 'conteudo' value = '$completo'> $completo</option>";
        }
        
          
              ?>
      </select> 
      <?php ?>

      <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="grau">
        <p for="tipo-sanguineo" class="text-add">Grau</p>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="def_visual">
        <p for="tipo-sanguineo" class="text-add">Deficiência visual </p>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="validade" name="tipo_sanguineo" >
        <p for="tipo-sanguineo" class="text-add">Tipo Sanguineo</p>
      </div>
    </div>

    <div class="row">
      <div class="input-field input-add">
        <input type="text" class="form-control" name="alergia" >
        <p for="alergias" class="text-add">Alergias</p>
      </div>
      
    </div>
      <p for="Observacoes" class="text-add">Observações</p>
    <div class="texto-observacoes">
        <textarea class="form-control" name="obs" ></textarea>
        
        <button type="submit" name="submit" class="btn btn-primary"> Adicionar </button>
        </div>
    
  </form>
</div>




<?php


if(isset($_POST['submit'])){

    $nome_escolhido = $_POST['nome-escolhido'];
    $pedaco = explode(" ", $nome_escolhido);
    $nome = $pedaco[0];
    $sobrenome = $pedaco[1];
    $sql = "SELECT * FROM usuario WHERE nome = '$nome' AND sobrenome = '$sobrenome'";
    $result = mysqli_query($connect, $sql);
    $info = mysqli_fetch_array($result); 
    $codigo = $info['codigo'];
    $grau = $_POST['grau'];
    $def_visual = $_POST['def_visual'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];
    $alergia = $_POST['alergia'];
    $obs = $_POST['obs'];

    if( $nome_escolhido == null or $grau == null or $def_visual == null or $tipo_sanguineo == null or $alergia == null or $obs == null){
      echo '<script type="text/javascript">';
                echo ' alert("Todos os campos precisam ser preenchidos!")';
                echo '</script>';
    }else{
      $sql = "INSERT INTO fichamedica (nome ,grau ,def_visual ,tipo_sanguineo ,alergia ,obs, usuario_codigo) VALUES ('$nome_escolhido','$grau' ,'$def_visual' ,'$tipo_sanguineo' ,'$alergia', '$obs', '$codigo')";

  
      if (mysqli_query($connect, $sql)) {
        $sql = "UPDATE usuario SET tipo = 'cliente1' WHERE codigo = '$codigo' ";
        mysqli_query($connect, $sql);
        header('LOCATION: index.php');
       
     } else {
        echo "Erro: " . $sql . "" . mysqli_error($connect);
     }
     $connect->close();
    }
    

    }
 

