<?php 
    session_start();
    require './admin/proccess/task.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/css/general.css">
    <link rel="stylesheet" href="./src/css/dashboard.css">
</head>
<body style="height: 100vh; padding: 100px;">
    <div class="container">
        <?php if(isset($_GET['message']) and $_GET['message'] == 'denied') :?>
            <div class="alerta error">
                <p>The task must have at least 5 characters</p>
            </div>
        <?php endif; ?>
        <div class="form">
            <form action="dashboard.php" method="POST">
                <input type="text" placeholder="Name of task" name="taskName" autocomplete="off">
                <input type="submit" value="Add task">
            </form>
        </div>
        <div class="tasks">
            
        </div>
    </div>
</body>
</html>

<?php if(isset($_SESSION['User'])){?>
        <a href="./admin/proccess/logout.php?result=destroy">logout</a>
    <?php 
    }else{
        header('Location: ./admin/proccess/logout.php?result=destroy');
    }
?>
