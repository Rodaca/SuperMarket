<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

session_start();

if(isset($_POST['loguearse'])){
    require_once('configUser.php');
    $users= new User();

    $users->setEmail($_POST['email']);

    $users->setPassword($_POST['password']);


    $login = $users->login();

    if($login){
        echo"<script>document.location='../Home/home.php'</script>";
    }else{
        echo"<script>alert('usuario y/o password incorrecto')document.location='loginRegister.php'</script>";
    }
    

}