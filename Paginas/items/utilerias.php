<?php

function direccionar($mensaje, $dir)
{
    include('items/encabezado.php');
    echo '<div class="formulario-div" style="color: brown">';
    echo '<h1 style="text-align:center">' . $mensaje . '</h1>';
    echo '<h4 style="text-align:center"> Redireccionando </h4>';
    echo '</div>';
    include('items/pie.php');
    header('refresh:3,url=' . $dir);
}

function validar($texto)
{
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
}

function conectar()
{
    define('SERVIDOR', 'localhost');
    define('USUARIO', 'root');
    define('PASSWORD', '');
    define('BD', 'papereasy');
    $resultado = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD);
    return $resultado;
}

function subir_imagen($archivo)
{
    if (empty($archivo)) {
        return null;
    }
    $nombre = $archivo['name'];
    $origen = $archivo['tmp_name'];
    $tama = $archivo['size'];
    $tipo = $archivo['type'];
    $error = $archivo['error'];

    $extensiones = array('jpg', 'jpeg', 'png');

    $nombre_y_ext = explode('.', $nombre);
    $extension = strtolower(end($nombre_y_ext));

    if (!in_array($extension, $extensiones)) {
        echo 'Es un archivo no valido';
        return null;
    } elseif ($error > 0) {
        echo 'Hubo un error al subir la imagen';
        return null;
    } elseif ($tama > 1000000) {
        echo 'La imagen excede 1MB';
        return null;
    } else {
        $nombre_nuevo = uniqid('', true) . '.' . $extension;
        $destino = "../imagenes-Producto/" . $nombre_nuevo;
        move_uploaded_file($origen, $destino);

        return $destino;
    }
}

/*--------------------agrega producto---------------------------------------------- */
function ver_productos($producto, $conexion)
{
    echo "<style>
        .contenedor-t {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin: 20px;
        }
        .producto-tarjeta {
            background-color: #f4f4f4;
            border: 2px solid #ddd;
            border-radius: 10px;
            width: 250px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
        }
        .producto-tarjeta:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .producto-tarjeta .nombre {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .producto-tarjeta .precio {
            font-size: 1.2em;
            color: #4CAF50;
            margin-bottom: 15px;
        }
        .producto-tarjeta .imagen {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
            max-height: 150px;
            object-fit: cover;
        }
        .producto-tarjeta .boton {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .producto-tarjeta .boton:hover {
            background-color: #45a049;
        }
        .producto-tarjeta .boton-eliminar {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            font-weight: bold;
        }
        .producto-tarjeta .boton-eliminar:hover {
            background-color: darkred;
        }
    </style>";

    echo "<div class='contenedor-t'>";

    $sql = "select * from producto where tipo='$producto'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($renglon = mysqli_fetch_assoc($resultado)) {
            $producto = $renglon['producto'];
            $precio = $renglon['precio'];
            $imagen = $renglon['imagen'];
            echo 
            "<div class='producto-tarjeta'>
                <button class='boton-eliminar' data-nombre='$producto'>×</button>
                <h2 class='nombre'>$producto</h2>
                <h3 class='precio'>$precio</h3>
                <img src='$imagen' alt='' class='imagen'>
                <button class='boton max'>Agregar al Carrito</button>
            </div>";
        }
    }  
    echo "</div>";

    // JavaScript para manejar el evento de eliminación
    echo "<script>
    document.querySelectorAll('.boton-eliminar').forEach(button => {
        button.addEventListener('click', () => {
            const producto = button.getAttribute('data-producto'); // Obtener el nombre del producto
            if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                fetch('/paginas/eliminar_producto.php', { // Ruta absoluta
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'producto=' + encodeURIComponent(producto) // Usar el campo correcto
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        const tarjeta = button.closest('.producto-tarjeta'); // Identificar la tarjeta
                        if (tarjeta) tarjeta.remove(); // Eliminar la tarjeta del DOM
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
</script>";



}

?>
