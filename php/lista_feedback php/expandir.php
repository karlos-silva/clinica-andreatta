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
      
        $sql = "SELECT * FROM feedback WHERE codigo = '$codigo'";
        $resultado = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_array($resultado);
      endif;

   
?>


<div class="container-informacoes">

<?php
echo $dados['info'];
?>

</div>
