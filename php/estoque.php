<?php


include_once 'db_connect.php';

include_once 'header.php';

include_once 'message.php'
?>

  <?php 
    
    ?>
        <div class="container">
            <div class="row justify-content-center">
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
                        $sql = "SELECT * FROM item";
                        $resultado = mysqli_query($connect, $sql);

                        if(mysqli_num_rows($resultado) > 0):

                        while($dados = mysqli_fetch_array($resultado)):
                        ?>
                        <tr>
                            <td><?php echo $dados['nome'];?></td>
                            <td><?php echo $dados['quantidade'];?></td>
                            <td><?php echo $dados['fornecedor'];?></td>
                            <td><?php echo $dados['validade'];?></td>
                            <td><a href="editar_produtos.php?codigo=<?php echo $dados['codigo'];?>" class="btn btn-info ">Editar</a></td>

                            <td><a href="#modal<?php echo $dados['codigo']; ?>" class="btn red modal-trigger">Deletar</a></td>

                            <!-- Modal Structure -->
                            <div id="modal<?php echo $dados['codigo']; ?>" class="modal">
                                <div class="modal-content">
                                <h4>Opa!</h4>
                                <p>Tem certeza que deseja deletar esse produto?</p>
                                </div>
                                <div class="modal-footer">
                                

                                    <form action="delete.php" method="POST">
                                        <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
                                        <button type="submit" name="btn-deletar" class="btn green">Sim, quero deletar!</button>
                                        <a href="#!" class="modal-close waves-effect waves-green btn red">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                            
                        </tr>
                    <?php endwhile; 
                    else: ?>

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
            <a href="adicionar_produtos.php" class= "btn btn-info">Adicionar</a>
        </div>

<?php
include_once 'footer.php'
?>