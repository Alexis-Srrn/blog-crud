<?php
if(isset($_POST)){

    //cargar la conexion a la base de datos
    require '../includes/conexion.php';

    if(!isset($_SESSION)){
        session_start();
    }
    
    
    /*if(isset($_POST['name'])){
        
    }else{
        $nombre = false;
    }*/
    
    //Recoger datos
    $nombre = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $apellido = isset($_POST['lastname']) ? mysqli_real_escape_string($db,$_POST['lastname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
    
    //Array de errores
    $errores = array();

    //Validar datos -- Nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }
    //Validar datos -- Apellidos
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)){
        $apellido_validado = true;
    }else{
        $apellido_validado = false;
        $errores['apellidos'] = "Los apellidos no son válidos";
    }
    //Validar datos -- Email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }
    //Validar datos -- Password
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía";
    }

    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        //cifrar contraseña -- para la prueba siempre serán 123 o 1234
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['ccost'=>4]);
        //insertar usuarios en la base de datos
        $sql = "INSERT INTO usuarios (id, nombre, apellidos, email, password, fecha) 
                VALUES (null, '$nombre', '$apellido', '$email', '$password_segura', CURDATE())";
        $guardar = mysqli_query($db, $sql);
        
        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";    
        }
    }else{
        $_SESSION['errores'] = $errores;
        
    }
}
header('Location:../index.php');
?>