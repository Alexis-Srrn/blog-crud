<?php


$username = 'root';
$password = '12345678';
$base_datos = 'blog_1';
$db = mysqli_connect('localhost',$username, $password,$base_datos);

mysqli_query($db, "SET NAMES utf8");

//Iniciar sesión
if(!isset($_SESSION)){   
    session_start();
   }

?>
