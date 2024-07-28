<?php
if (session_status() == PHP_SESSION_NONE) {
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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../CSS/formulario.css">
    <link rel="stylesheet" href="../CSS/carrito.css">
    <script src="../scripts/carrito.js" defer></script>
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
            if (isset($_SESSION['usuario'])) {
                echo "<a href='salir.php'>Salir</a>";
                echo "<a href='agregar.php'>Agregar Producto</a>";
            } else {
                echo "<a href='sesionini.php'>Entrar</a>";
            }
            ?>
        </div>

        <img src="../imagenes/carrito.png" alt="" class="carrito-boton">
        <div class="carrito-fondo">
            <div class="carrito-ventana">
                <p class="carrito-titulo">Carrito</p>
                <div class="carrito-contenido">
                    <p class="columna-producto">Producto</p>
                    <p class="columna-cantidad">Cantidad</p>
                    <p class="columna-precio">Precio</p>
                </div>

                <div class="producto">
                    <div class="renglon">
                        <p class="nombre">Libreta italiana</p>
                        <p class="precio">$30.00</p>
                        <button class="boton-quitar">Remover</button>
                    </div>

                    <div class="renglon">
                        <p class="nombre">Libreta Escolar</p>
                        <p class="precio">$20.00</p>
                        <button class="boton-quitar">Remover</button>
                    </div>

                    <div class="renglon">
                        <p class="nombre">Libreta de dibujo</p>
                        <p class="precio">$50.00</p>
                        <button class="boton-quitar">Remover</button>
                    </div>
                </div>
                <div class="total">
                    <p>Total</p>
                    <p class="precio-total">$100.00</p>
                </div>
                <a href="compra.php">
                <button class="boton-pagar">Pagar</button></a>

                <div class="menu-principal">
                    <button class="volver">Regresar</button>
                </div>
            </div>
        </div>

        <div class="saturno">
            <img src="../Imagenes/saturno.png" alt="saturno">
        </div>
    </header>



    <main>