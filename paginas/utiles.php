<?php
    include('items/encabezado.php');
    include('items/utilerias.php');
?>
<div class="verproducto">


<?php
    $conexion=conectar();
    ver_productos('utiles',$conexion);
    mysqli_close($conexion);
?>  

</div>

<?php
    include('items/pie.php');
?>