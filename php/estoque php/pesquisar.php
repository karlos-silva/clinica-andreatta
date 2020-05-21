<?php

require_once '../server php/db_connect.php';

include_once 'header.php';

include_once 'message.php';

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
          <th>Nome</th>
          <th>Quantidade</th>
          <th>Fornecedor</th>
          <th>Validade</th>
        </tr>
      </thead>
      <?php
        $sql = "SELECT * FROM item WHERE nome = '$pesquisar' AND estatus = 0 ";
        $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) > 0) :

        while ($dados = mysqli_fetch_array($resultado)) :
      ?>
          <tr class="dados">
            <td><?php echo $dados['nome']; ?></td>
            <td><?php echo $dados['quantidade']; ?></td>
            <td><?php echo $dados['fornecedor']; ?></td>
            <td><?php echo $dados['validade']; ?></td>
            <td>
              <a href="editar_produtos.php?codigo=<?php echo $dados['codigo']; ?>" class="btn btn-info "><i class="material-icons">edit</i></a>
              <a href="#modal<?php echo $dados['codigo']; ?>" class="btn red modal-trigger"><i class="material-icons">delete</i></a>
            </td>

            <!-- Modal Structure -->
            <div id="modal<?php echo $dados['codigo']; ?>" class="modal">
              <div class="modal-content">
                <h4>Opa!</h4>
                <p>Tem certeza que deseja deletar esse produto?</p>
              </div>
              <div class="modal-footer">


                <form action="delete.php" method="POST">
                  <input type="hidden" name="codigo" value="<?php echo $dados['codigo']; ?>">
                  <button type="submit" name="btn-deletar" class="btn green">Sim, quero deletar!</button>
                  <a href="#!" class="modal-close waves-effect waves-green btn red">Cancelar</a>
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
  <a href="estoque.php" class= "btn btn-info">Voltar</a>






  <?php
  include_once 'footer.php'
  ?>