<?php 
    require './admin/databases.php';
    $errores = [];
    $taskName = '';

    if($_POST){
        $taskName = $_POST['taskName'];

        if(strlen($taskName) < 5){
            $errores[] = 'The task must have at least 5 characters';
        }

        if(empty($errores)){
            $insert = mysqli_query($db, "INSERT INTO task (taskName)
            VALUES('$taskName')");
        }
    }

    $query = "SELECT * FROM task";
    $result_tasks = mysqli_query($db, $query);

    while($row = mysqli_fetch_array($result_tasks)):?>
        <div class="task">
            <p><?php echo $row['taskName'];?></p>
            <p><?php echo $row['id'];?></p>
        </div>
    <?php endwhile; ?>

    
    