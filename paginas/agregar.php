<?php
    include('items/encabezado.php');
?>

    <div class="formulario-div">
        <form action="agregar-manejo.php" method="post" enctype="multipart/form-data">

            <h3>Numevo Producto</h3>
        
            <label for="Producto">Producto</label>
            <input type="text" id="Producto" name="Producto" required>
    
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo">
                <option value="fiesta">fiesta</option>
                <option value="libretas">libretas</option>
                <option value="utiles">utiles</option>
                <option value="papeleria">papeleria</option>
            </select>

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" step=".01" required>
    
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen">

            <input type="submit" value="Guardar" name="guardar" class="boton">
        </form>

    </div>

<?php
    include('items/pie.php');
?>