<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Estoque</title>
  </head>
  <body>
  <?php 
    $mysqli = new mysqli('localhost','root','','clinica_andreatta') or die (mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM item") or die ($mysqli->error);
    function pre_r( $array ){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
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
                            <th colsapn="2">Acao</th>
                        </tr>
                    </thead>
                    <?php
                        while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?php echo $row['nome'];?></td>
                            <td><?php echo $row['quantidade'];?></td>
                            <td><?php echo $row['fornecedor'];?></td>
                            <td><?php echo $row['validade'];?></td>
                            <td>
                                <a href="process.php?editar=<?php echo $row['codigo'];?>" class="btn btn-info">Editar</a>
                                <a href="process.php?deletar=<?php echo $row['codigo'];?>" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <a href="estoque_add.php" class= "btn btn-info">Adicionar</a>
        </div>
    
    </body>
</html>