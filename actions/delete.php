<?php 
    require '../admin/databases.php';
    $id = $_GET['id'];

    $query = mysqli_query($db, "DELETE FROM task WHERE id=$id");

    if($query){
        header('Location: ../dashboard.php');
    }

?>