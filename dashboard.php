<?php 
    session_start();
    require './admin/proccess/task.php';
    $name = $_SESSION['User']['name'];
    $img = '';

    $queryPrueba = mysqli_query($db, "SELECT name, avatar FROM users");
    var_dump($queryPrueba);
    echo $img;
    echo $name;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    

</head>
<body style="height: 100vh;">
    <nav>
        <div class="userPre">
            <img src="./src/img/avatar.png" alt="IMG Avatar DashBoard CRUD">
            <p><?php  echo $_SESSION['User']['name'];?></p>
        </div>
        <?php if(isset($_SESSION['User'])){?>
            <a href="./admin/proccess/logout.php?result=destroy" class="buttonLogout">Logout</a>
        <?php 
        }else{
            header('Location: ./admin/proccess/logout.php?result=destroy');
        }
        ?>
    </nav>
    <div class="gContainer" style="margin-bottom: 20px;">
        <div class="formTaskContainer">
            <form action="dashboard.php" method="POST" class="formTask">
                <input type="text" placeholder="Name of task" name="taskName" autocomplete="off" class="inputTask">
                <input type="submit" value="Add task" class="inputSubmit">
            </form>
        </div>
        <div class="container">
            <!-- Message Error -->
            <?php if(isset($_GET['message']) and $_GET['message'] == 'denied') :?>
                <div class="alerta error">
                    <p>The task must have at least 5 characters and less than 25 </p>
                    <i class="bi bi-x-circle"></i>
                </div>
            <?php endif; ?>
            <!-- End Message Error -->
            <!-- Message Success -->
            <?php if(isset($_GET['message']) and $_GET['message'] == 'success'):?>
                <div class="alerta done">
                    <p>The task has been successfully registered</p>
                    <i class="bi bi-x-circle"></i>
                </div>
            <?php endif; ?>
            <!-- End Message Success -->

            
            
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
                        <p style="margin-left: 14px; text-align: center;"><?php echo $row['taskName']?></p>
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
    </div>

    
    <script src="./src/js/app.js"></script>
</body>
</html>


