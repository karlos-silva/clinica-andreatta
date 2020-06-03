<?php
session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}

require_once '../server php/db_connect.php';

include_once 'header.php';

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
                        <th>Codigo</th>
                        <th>Nome do Paciente</th>
                    </tr>
                </thead>
                <?php
                    $codigo = $_SESSION['codigo'];
                    $sql = "SELECT * FROM feedback WHERE estatus = 0";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):

                    while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr class="dados">
                        <td><?php echo $dados['codigo'];?></td>
                        <td><?php echo $dados['nome'];?></td>
                        <td>
                            <a href="expandir.php?codigo=<?php echo $dados['codigo'];?>" class="btn btn-edit "><i >Expandir</i></a>
                            <a href="#modal<?php echo $dados['codigo']; ?>" class="btn remove modal-trigger"><i class="material-icons">delete</i></a>
                        </td>

                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['codigo']; ?>" class="modal">
                            <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja deletar este feedback?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
                                    <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar!</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn green">Cancelar</a>
                                </form>
                            </div>
                        </div>
                        
                    </tr>
                <?php endwhile; 
                else: ?>

                <tr>
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