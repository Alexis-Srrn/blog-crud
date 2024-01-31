<?php
if(isset($_POST)){

    //cargar la conexion a la base de datos
    require '../includes/conexion.php';


    
    
    /*if(isset($_POST['name'])){
        
    }else{
        $nombre = false;
    }*/
    
    //Recoger datos
    //$nombre = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    /*
        $apellido = isset($_POST['lastname']) ? mysqli_real_escape_string($db,$_POST['lastname']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
        $new_password = isset($_POST['new_password']) ? mysqli_real_escape_string($db,$_POST['new_password']) : false;
    */
    $nombre = mysqli_real_escape_string($db, $_POST['name']) ?? false;
    $apellido = mysqli_real_escape_string($db,$_POST['lastname']) ?? false;
    $password = mysqli_real_escape_string($db,$_POST['password']) ?? false;
    $new_password = mysqli_real_escape_string($db,$_POST['new_password']) ?? false;
       
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



    //Validar datos -- Password
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía";
    }
    
    
    $verify = password_verify($password, $_SESSION['usuario']['password']);
    if(!$verify){
        $password_validado = false;
        $errores['password'] = "La contraseña actual no es correcta!!";
    }
    

    //Validar datos -- New Password
    if(!empty($new_password)){
        $new_password_validado = true;
    }else{
        $new_password_validado = false;
        $errores['new_password'] = "La contraseña nueva está vacía";
    }



    
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        //cifrar contraseña -- para la prueba siempre serán 123 o 1234
        $password_segura = password_hash($new_password, PASSWORD_BCRYPT, ['ccost'=>4]);

        $usuario = $_SESSION['usuario'];
        
        //Actualizar usuario en la base de datos
        $sql = "UPDATE usuarios
                SET nombre = '$nombre', apellidos = '$apellido', password = '$password_segura'  
                WHERE id= ".$usuario['id'];

        $guardar = mysqli_query($db, $sql);
        
        if($guardar){
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellidos'] = $apellido;
            $_SESSION['usuario']['password'] = $password_segura;
            $_SESSION['completado'] = "Tus datos se han actualizado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al actualizar el usuario";    
        }
    }else{
        $_SESSION['errores'] = $errores;
        
    }
}
header('Location: ../mis_datos.php');
?>