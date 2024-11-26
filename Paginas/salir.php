<?php
    include('estilos.php');
    include('items/utilerias.php');
    session_start();


    if(isset($_SESSION['usuario'])){
        session_unset();
        session_destroy();
        direccionar('Sesion Cerrada','index.php');
        include('estilos.php');
    }else{
        direccionar('No a iniciado sesion','index.php');
    }
?>