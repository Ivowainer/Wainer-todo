<?php 
    require './admin/databases.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $errores = [];
        
        if(strlen($username) < 3){
            $errores[] = 'The username must exceed 3 characters';
        }
        if(strlen($password) < 6){
            $errores[] = 'The password must exceed 6 characters';
        }
        
        if(empty($errores)){

            $query = "INSERT INTO users(name, password)
            VALUES('$username', '$password')";

            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('Location: login.php?result=success');
            }
        }
    }
    
?>