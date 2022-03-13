<?php 
    session_start();
    require '../admin/databases.php';
    $id = $_GET['id'];
    $username = $_SESSION['User']['name'];

    $query = mysqli_query($db, "DELETE FROM task$username WHERE id=$id");

    if($query){
        header('Location: ../dashboard.php');
    }

?>