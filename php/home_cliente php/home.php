<?php

session_start();
if(!isset($_SESSION['codigo'])){
    header('Location: ../logout/logout.php');
}

require_once '../server php/db_connect.php';

include_once 'header.php';

?>



<?php
include_once 'footer.php'
?>