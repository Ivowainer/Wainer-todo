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
    <div class="formTask">
        <form action="dashboard.php" method="POST">
            <input type="text" placeholder="Name of task" name="taskName" autocomplete="off" class="inputTask">
            <input type="submit" value="Add task" class="input">
        </form>
    </div>
    <div class="container">
        <!-- Message Error -->
        <?php if(isset($_GET['message']) and $_GET['message'] == 'denied') :?>
            <div class="alerta error">
                <p>The task must have at least 5 characters and less than 15 </p>
            </div>
        <?php endif; ?>
        <!-- End Message Error -->
            
        
        <div class="taskContainer">
            <div class="taskHead">
                <p>ID</p>
                <p>Nombre</p>
                <p>Acciones</p>
            </div>
            <div class="taskBody">
                <!-- Print all task-->
                <?php while($row = mysqli_fetch_array($result_tasks)) : ?>
                <div class="task">
                    <p><?php echo $row['id']?></p>
                    <p style="margin-left: 45px;"><?php echo $row['taskName']?></p>
                    <div class="taskAcciones">
                        <a href="/actions/delete.php?id=<?php echo $row['id']?>">Eliminar</a>
                        <a href="/actions/edit.php?id=<?php echo $row['id']?>&taskName=<?php echo $row['taskName'] ?>">Editar</a>
                    </div>
                </div>
                <?php endwhile; mysqli_free_result($result_tasks); ?>
                <!-- End Print all task-->
            </div>
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
