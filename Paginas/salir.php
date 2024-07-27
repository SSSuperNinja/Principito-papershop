<?php
    include('items/utilerias.php');
    session_start();

    if(isset($_SESSION['usuario'])){
        session_unset();
        session_destroy();
        direccionar('Sesion Cerrada','index.php');
    }else{
        direccionar('No a iniciado sesion','index.php');
    }
?>