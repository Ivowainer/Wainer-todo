<?php 
    session_start();
    //Conexión bd
    require '../admin/databases.php';
    $id = $_GET['id'];
    $taskGet = $_GET['taskName'];
    $username = $_SESSION['User']['name'];

    //Validación si cumple con las caracteristicas
    if(isset($_POST['taskNameEdit']) and isset($_GET['id'])){
        $taskNameEdit = $_POST['taskNameEdit'];

        if(strlen($taskNameEdit) >= 5 and strlen($taskNameEdit) <= 25){
            $query = mysqli_query($db, "UPDATE task$username SET taskName = '$taskNameEdit' WHERE id = $id;");
            if($query){
                header('Location: ../dashboard.php');
            }
        }else{
            header('Location: ../dashboard.php?message=denied');
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../src/css/general.css">
    <link rel="stylesheet" href="../src/css/editt.css">
</head>
<body >
    <nav>
        <div class="userPre">
            <img src="../uploads/<?php echo $_SESSION['User']['avatar'] ?>" alt="IMG Avatar DashBoard CRUD">
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
    <div class="GlobalContainer" style="height: 100vh; display:flex; justify-content: center; ">
        <div class="gContainer" >
            <div class="container">
                <!-- Message Error -->
                <?php if(isset($_GET['message']) and $_GET['message'] == 'denied') :?>
                    <div class="alerta error">
                        <p>The task must have at least 5 characters</p>
                    </div>
                <?php endif; ?>
                <!-- End Message Error -->
                <!-- Message Error -->
                <?php if(isset($_GET['message']) and $_GET['message'] == 'moreCaracharacters') :?>
                    <div class="alerta error">
                        <p>The task must have less than 15 characters</p>
                    </div>
                <?php endif; ?>
                <!-- End Message Error -->
                
                <div class="taskContainer">
                    <div class="taskHead">
                        <p>ID</p>
                        <p>Nombre</p>

                    </div>
                    <div class="taskBody">
                        <!-- Print all task-->
                        <form class="formTask" method="POST" action="edit.php?id=<?php echo $id ?>">
                            <p class="inputTask inputId"><?php echo $id; ?></p>
                            <input type="submit" value="Submit" class="inputTask inputName inputSubmit">                             
                            <input type="text" value="<?php echo $taskGet; ?>" class="inputTask inputName" name="taskNameEdit" autocomplete="off"> 
                        </form>
                        <!-- End Print all task-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>


