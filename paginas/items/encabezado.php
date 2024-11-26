<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cargar configuraciones desde settings.json
$configFile = __DIR__ . '/../../settings.json';
$config = json_decode(file_get_contents($configFile), true);

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
<header style="background: <?php echo $config['header']['bgColor']; ?>;">
    <div class="logo">
        <a href="index.php">
            <img src="<?php echo $config['header']['logo']; ?>" alt="logo">
        </a>
    </div>

    <div class="titulo">
        <h1 style="font-family: Arial">
            <?php echo $config['header']['name']; ?>
        </h1>
    </div>

    <div class="login">
        <?php
        if (isset($_SESSION['usuario'])) {
            echo "<a href='salir.php'>Salir</a>";
            echo "<a href='agregar.php'>Agregar Producto</a>";
        } else {
            echo "<a href='sesionini.php' >Entrar</a> ";
        }
        ?>
    </div>


        <img src="../imagenes/carrito.png" alt="" class="carrito-boton">
        <div class="carrito-fondo">
            <div class="carrito-ventana">
                <p class="carrito-titulo">Carrito</p>
                <div class="carrito-contenido">
                    <p class="columna-producto">Producto</p>
                    <p class="columna-precio">Precio</p>
                </div>

                <div class="producto">
                    <div class="renglon"></div>
                    <div class="renglon"></div>
                    <div class="renglon"></div>
                </div>
                <div class="total">
                    <p>Total</p>
                    <p class="precio-total"></p>
                </div>
                <a href="compra.php">
                    <button class="boton-pagar">Pagar</button>
                </a>

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
