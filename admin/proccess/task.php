<?php 
    //Conexion base de datos
    $db = mysqli_connect('localhost', 'root', '', 'dashboard_crud');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $taskName = $_POST['taskName'];

        /* if(strlen($taskName) < 5){
            $errores[] = 'The task must have at least 5 characters';
        } */

        if($taskName != ""){
            $insert = mysqli_query($db, "INSERT INTO task (taskName)
            VALUES('$taskName')");  

            header('Location: dashboard.php?message=success');
        }else{
            header('Location: dashboard.php?message=denied');
            mysqli_close($db);
        }
    }
    $result_tasks = mysqli_query($db, "SELECT * FROM task");

    while($row = mysqli_fetch_array($result_tasks)){?>
        <div class="task">
            <p><?php echo $row['id'];?></p>
            <p><?php echo $row['taskName'];?></p>
        </div>
    <?php } mysqli_free_result($result_tasks); ?>
    

    
    