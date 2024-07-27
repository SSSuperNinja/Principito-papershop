<?php
    include('items/encabezado.php');
    include('items/utilerias.php');
?>
<div class="verproducto">
    
    <?php
        $conexion=conectar();
        ver_productos('fiesta',$conexion);
        mysqli_close($conexion);
    ?>  
    <?php
        function ver_productos($producto,$conexion){
            echo "<div class='contenedor'>";
        
        
            $sql="select * from producto where tipo='$producto'";
            $resultado=mysqli_query($conexion,$sql);
        
            if(mysqli_num_rows($resultado)>0){
                while($renglon=mysqli_fetch_assoc($resultado)){
                        $producto=$renglon['producto'];
                        $precio=$renglon['precio'];
                        $imagen=$renglon['imagen'];
                        echo 
                        "<div class='producto-tarjeta'>
                            <h2 class='nombre'>$producto</h2>
                            <h3 class='precio'>$precio</h3>
                            <img src='$imagen' alt='' class='imagen'>
                            <button class='boton max'>Agregar al Carrito</button>
                        </div>";
                }
            }  
            echo "</div>";
        }
?>
</div>
    
<?php
    include('items/pie.php');
?>