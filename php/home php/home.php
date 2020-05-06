<?php

session_start();

require_once '../server php/db_connect.php';

include_once 'header.php';

include_once 'verifica_login.php';
?>

<h2>Olá, <?php echo $_SESSION['email'];?></h2>
<h2><a href="logout.php">Sair</a></h2>

<?php
include_once 'footer.php'
?>