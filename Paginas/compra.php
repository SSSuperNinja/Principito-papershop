<?php
include('items/encabezado.php');
include('estilos.php');
?>

<style>
    .formulario-div {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 20px;  
    }

    form {
        background: #ffffff;
        border-radius: 10px;
        padding: 30px;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    form h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.8em;
        color: #fde14a;
        font-weight: bold;
    }

    label {
        font-size: 1rem;
        font-weight: bold;
        color: white;
        margin-bottom: 5px;
        display: block;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        background-color: #f9f9f9;
        box-sizing: border-box;
    }

    input:focus {
        border-color: #4CAF50;
        outline: none;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    }

    .boton {
        display: block;
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .boton:hover {
        background-color: #45a049;
    }

    .boton:active {
        background-color: #3e8e41;
    }
</style>

<div class="formulario-div">
    <form action="index.php" method="post">
        
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

<script src="../scripts/compra.js"></script>

<?php
include('items/pie.php');
?>
