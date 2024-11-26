<?php
    include('items/encabezado.php'); // Incluir encabezado
    include('estilos.php'); // Incluir estilos

    // Ruta al archivo settings.json
    $configFile = __DIR__ . '/../settings.json';

    // Leer configuraciones desde settings.json
    $config = json_decode(file_get_contents($configFile), true);

    // Obtener las categorías y sus textos desde settings.json
    $categorias = $config['sections'];
?>

<div class="formulario-div">
    <form action="agregar-BDD.php" method="post" enctype="multipart/form-data">

        <h3>Nuevo Producto</h3>
        
        <label for="producto">Producto</label>
        <input type="text" id="producto" name="producto" required>

        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo">
            <?php foreach ($categorias as $key => $data): ?>
                <option value="<?php echo $key; ?>"><?php echo $data['text']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" step=".01" required>

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="imagen">

        <input type="submit" value="Guardar" name="guardar" class="boton">
    </form>
</div>

<?php
    include('items/pie.php'); // Incluir pie
?>
