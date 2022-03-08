<?php     
    session_start();
    require './admin/databases.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errores = [];

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sqlUsername = mysqli_query($db, "SELECT * FROM users WHERE name='$username'");
        $sqlPassword = mysqli_query($db, "SELECT * FROM users WHERE password='$password'");
        
        if($username = mysqli_fetch_assoc($sqlUsername) and $password = mysqli_fetch_assoc($sqlPassword)){

            $_SESSION['User'] = $username;
            
            if($_SESSION['User']){
                header('Location: dashboard.php');
            }
        }else{
            header('Location: login.php?result=denied');
        }
        
    }
?>