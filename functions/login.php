<?php
    //cargar la conexion a la base de datos e iniciar sesion
    require '../includes/conexion.php';
    if(!isset($_SESSION)){
        session_start();
    }
    //Recoger datos del formulario
    if(isset($_POST)){

        if(isset($_SESSION['error_login'])){
            session_unset();
        }
        
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        //Consulta para comprobar las credenciales del usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($db, $sql);

        if($login && mysqli_num_rows($login) == 1){     
            $usuario = mysqli_fetch_assoc($login);
            //Comprobar la contraseña -- cifrarla de nuevo
            $verify = password_verify($password, $usuario['password']);
            
            if($verify){
                //Utilizar una sesión para guardar los datos del usuario logueado
                $_SESSION['usuario'] = $usuario;

            }else{
                //Si algo falla enviar una sesión con el fallo
                $_SESSION['error_login'] = "Login incorrecto!!";
            }
            

        }else{
            //mensaje de error
            $_SESSION['error_login'] = "Login incorrecto!!";
        }

        
        
    }

    header('Location: ../index.php');


?>