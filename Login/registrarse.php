<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['registrarse'])){
    require_once('configUser.php');
    $users= new User();

    $users->setEmpleadoId(3);
    $users->setEmail($_POST['email']);
    $users->setUsername($_POST['username']);
    $users->setPassword($_POST['password']);
    $users->setTipoUsuario('Trabajador');

    $users->insertData();
    echo"<script>document.location='loginRegister.php'</script>";


}