<?php
    include('items/utilerias.php');
    include('estilos.php');
    session_start();

    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    if($usuario=='admin' && $password=='123'){ 
       direccionar('Bienvenido Adiministrador', 'index.php');
       $_SESSION['usuario']='administrador';
       include('estilos.php');
    }else{
        direccionar('Datos incorrectos', 'sesionIni.php');
        include('estilos.php');
    }
?>