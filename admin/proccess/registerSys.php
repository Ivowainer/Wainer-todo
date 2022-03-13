<?php 
    require './admin/databases.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $imagen = $_FILES['fileAvatar'];
        
        $errores = [];
    
        /* VALIDACIÓN */
        if(strlen($username) < 3){
            $errores[] = 'The username must exceed 3 characters';
        }
        if(strlen($password) < 6){
            $errores[] = 'The password must exceed 6 characters';
        }
        if(!$imagen['name'] || $imagen['error']){
            $errores [] = 'La imagen es obligatoria';
        }
        if($imagen['size'] / 1000 >= 2000){
            $errores[] = 'The size of the image exceeds the limit';
        }

        if(empty($errores)){
            /*UPLOAD AVATAR*/
            $directorio = 'uploads/';

            if(!is_dir($directorio)){
                mkdir($directorio);
            }
            

            $archivo = $directorio . basename($_FILES['fileAvatar']['name']);

            $tipoArchivo =  "." . strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

            //Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . $tipoArchivo;

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $directorio . $nombreImagen);

            $query = "INSERT INTO users(name, password, avatar)
            VALUES('$username', '$password', '$nombreImagen')";

            //Crea tabla
            $resultadoTabla = mysqli_query($db, "CREATE TABLE task$username(
                id INT(15) NOT NULL AUTO_INCREMENT,
                taskName VARCHAR(15),
                PRIMARY KEY (id)
            )");

            $resultado = mysqli_query($db, $query);

            if($resultado and $resultadoTabla){
                header('Location: index.php?result=success');
            }
        }      
        
    }
?>