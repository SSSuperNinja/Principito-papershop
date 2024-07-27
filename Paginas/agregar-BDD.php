
<?php
    include('items/utilerias.php');
    if(empty($_POST)){
        direccionar('NO HAY ACCESO','index.php');
        return;
    }

    
    $producto = $_POST['producto'];
    $tipo = $_POST['tipo'];
    $precio =$_POST['precio'];
   

    if($producto=='' || $tipo=='' || $precio==''){
        direccionar('informacion no valida', 'agregar.php');
        return;
    }

    $conexion=conectar();
    if(!$conexion){
        direccionar('Error en la coneccion.', 'agregar.php');
        return;
    }

    $imagen=subir_imagen($_FILES['imagen']);
    
    $sql="insert into producto(producto,precio,tipo,imagen) values('$producto','$precio','$tipo','$imagen')";


    $resultado=mysqli_query($conexion,$sql);
    if($resultado){
        direccionar('producto agregado correctamente', 'agregar.php');
    }else{
        direccionar('Error'.mysqli_error($conexion), 'agregar.php');
    }

    mysqli_close($conexion);
?>