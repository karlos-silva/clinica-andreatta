<?php
    session_start();
    if(!isset($_SESSION['codigo'])){
        header('Location: ../logout/logout.php');
    }
    
    require_once '../server php/db_connect.php';
    
    include_once 'header.php';
?>



<?php
    if(isset($_GET['codigo'])):
        $codigo = mysqli_escape_string($connect, $_GET['codigo']);
      
        $sql = "SELECT * FROM fichaMedica WHERE codigo = '$codigo'";
        $resultado = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_array($resultado);
      endif;

   
?>


<div class="container-informacoes">
<table class="table">

<table class="table">
    <tr>
        <th>Médico:</th> 
        <th> <label>Dr Marcos Andreatta </label> </th>
    </tr>
    <tr>
            <th>Nome Paciente:</th>
            <th><label><?php echo $dados['nome'] ?></label></th>
        
    </tr>
    <tr>
            <th>Tipo sanguíneo: </th>
            <th><label><?php echo $dados['tipo_sanguineo'] ?></label></th>
        
    </tr>
    <tr>
            <th>Grau:</th>
            <th><label><?php echo $dados['grau'] ?></label></th>
    </tr>
    <tr>
            <th>Deficiência Visual: </th>
            <th><label><?php echo $dados['def_visual'] ?></label></th>
    </tr>
    <tr>
            <th>Observações: </th>
            <th><label><?php echo $dados['obs'] ?></label></th>
    </tr>
</table>

</table>

</div>
