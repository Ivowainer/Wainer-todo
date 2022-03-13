<?php 

    require './admin/proccess/loginSys.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/css/general.css">
    <link rel="stylesheet" href="./src/css/login.css">
</head>
<body>   
    <div class="lContainer">
        <div class="loginPanel">

            <!-- Mensajes de error -->
            <?php if(isset($_GET['result']) && $_GET['result'] == 'success'): ?>
                <div class="card" style="padding: 10px;">
                    <p style="color: #C8C5CD;">You have successfully registered!</p>
                </div>
            <?php endif; ?>
            <?php if(isset($_GET['result']) && $_GET['result'] == 'denied'): ?>
                <div class="card" style="padding: 10px;">
                    <p style="color: #C8C5CD;">The <span style="color: orange"> password </span> or the <span style="color: orange"> username </span> are incorrect</p>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                        <p>Dashboard CRUD</p>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST" class="loginForm">
                                <input type="text" id="username" name="username" placeholder="Username" autocomplete="off" >

                                <input type="password" name="password" placeholder="Password">
                                <div class="register">
                                    <a href="register.php">Not registered yet?</a>
                                    <input type="submit" value="Login">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="registerContainer">
            <div class="cardRegister">
                <p>Not registered yet?</p>
                <p>Don't worry, register now</p>
                <a href="register.php">Register</a>
            </div>
        </div> -->
    </div>
</body>
</html>