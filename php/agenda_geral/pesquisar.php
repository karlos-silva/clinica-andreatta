<?php

session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}

require_once '../server php/db_connect.php';

include_once 'header.php';



$pesquisar = $_POST['pesquisar'];

?>


<div class="container">
  <div class="row ">
    <form action="pesquisar.php" method="POST">
      <div class="input-field input-pesquisar ">
        <input id="last_name" type="text" class="validate" name="pesquisar">
        <label for="last_name">Pesquisar</label>
        <button type="submit" class=" btn btn-pesquisar" name="btn-pesquisar" id=" btn btn-pesquisar">Pesquisar</button>

      </div>

    </form>

    <table class="table">
      <thead>
      <tr>
        <th>Data</th>
        <th>Cliente</th>
        <th>Consorcio</th>
        <th>Forma de pagamento</th>
       </tr>
      </thead>
      <?php
        $sql = "SELECT * FROM horarios WHERE info LIKE '%{$pesquisar}%' AND estatus = '1'";
        $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) > 0) :

        while ($dados = mysqli_fetch_array($resultado)) :
      ?>
      <tr class="dados">
          <td><?php echo $dados['info'];?></td>
          <td><?php 
              $codigo = $dados['usuario_codigo'];
              $sql = "SELECT * FROM usuario WHERE codigo = '$codigo'";
              $result = mysqli_query($connect, $sql);
              $info = mysqli_fetch_array($result);
              $nome = $info['nome'];
              $sobrenome = $info['sobrenome'];
              $completo = $nome . ' ' . $sobrenome;
              echo $completo;
              ?>
          </td>
          <td><?php echo $dados['consorcio'];?></td>
          <td><?php echo $dados['forma_pagamento'];?></td>
          <td>
              <a href="#modal<?php echo $dados['codigo']; ?>" class="btn red modal-trigger"><i class="material-icons">delete</i></a>
          </td>

          <!-- Modal Structure -->
          <div id="modal<?php echo $dados['codigo']; ?>" class="modal">
              <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja cancelar este agendamento?</p>
              </div>
              <div class="modal-footer">
                  <form action="delete.php" method="POST">
                      <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
                      <button type="submit" name="btn-deletar" class="btn green">Sim, quero cancelar!</button>
                      <a href="#!" class="modal-close waves-effect waves-green btn red">Mudei de ideia</a>
                  </form>
              </div>
          </div>
          
      </tr>
        <?php endwhile;
      else : ?>

        <tr>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
        </tr>

      <?php
      endif;
      ?>
    </table>
  </div>
  

  <?php
  include_once 'footer.php'
  ?>