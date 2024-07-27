<?php
    include('items/encabezado.php');
?>

<div class="formulario-div">

    <form action="procesar_compra.php" method="post">
        <h2>Formulario de Compra</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br>

        <button type="submit" class="boton">Realizar compra</button>
    </form>
</div>
<?php
    include('items/pie.php');
?>