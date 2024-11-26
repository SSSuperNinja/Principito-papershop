<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = $_POST['producto'] ?? '';

    // Validar entrada
    if (empty($producto)) {
        echo json_encode(['success' => false, 'message' => 'El nombre del producto está vacío.']);
        exit;
    }

    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'papereasy');
    if (!$conexion) {
        echo json_encode(['success' => false, 'message' => 'Error al conectar a la base de datos.']);
        exit;
    }

    // Escapar el valor para prevenir SQL Injection
    $producto = mysqli_real_escape_string($conexion, $producto);

    // Ejecutar consulta para eliminar
    $sql = "DELETE FROM producto WHERE producto = '$producto'";
    if (mysqli_query($conexion, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Producto eliminado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el producto: ' . mysqli_error($conexion)]);
    }

    mysqli_close($conexion);
}
?>
