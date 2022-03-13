<?php 
    session_start();

    if(isset($_GET['result']) and $_GET['result'] == 'destroy'){
        session_destroy();
        header('Location: ../../index.php');
    }
?>