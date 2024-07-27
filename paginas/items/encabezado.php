<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sitio para venta papeleria principito">
    <meta name="keywords" content="utiles, libretas, papeleria, fiesta">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../CSS/formulario.css">
</head>

<body>
    <header>
        <div class="logo">
        <a href="index.php"><img src="../Imagenes/logo.png" alt="logo"></a>
        </div>
        <div class="titulo">
            <h1>PAPELERIA PRINCIPITO</h1>
        </div>

        <div class="login">
        <?php
            if(isset($_SESSION['usuario'])){
                echo "<a href='salir.php'>Salir</a>";
                echo "<a href='agregar.php'>Agregar Producto</a>";
            } else {
                echo "<a href='sesionini.php'>Entrar</a>";
            }
        ?>
</div>
</div>
</div>

        <div class="carrito">
            <img src="../Imagenes/carrito.png" alt="carrito">
        </div>
        <div class="saturno">
            <img src="../Imagenes/saturno.png" alt="saturno">
        </div>
    </header>


    
    <main>