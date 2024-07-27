<?php

    function direccionar($mensaje, $dir){
        include('items/encabezado.php');
        echo'<div class="formulario-div" style="color: brown">';
        echo '<h1 style="text-aling:center">'. $mensaje . '</h1>';
        echo '<h4 style="text-aling:center"> Redireccionando </h4>';
        echo '</div>';
        include('items/pie.php');
        header('refresh:3,url=' . $dir);
    }    


    function validar($texto){
        $texto = trim($texto);
        $texto = stripslashes($texto);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

    function conectar(){
        define('SERVIDOR','localhost');
        define('USUARIO','root');
        define('PASSWORD','');
        define('BD','principito');
        $resultado=mysqli_connect(SERVIDOR,USUARIO,PASSWORD,BD);
        return $resultado;
    }



    function subir_imagen($archivo){
        
        if(empty($archivo)){
            return null;
        }
        $nombre=$archivo['name'];
        $origen=$archivo['tmp_name'];
        $tama=$archivo['size'];
        $tipo=$archivo['type'];
        $error=$archivo['error'];


        $extensiones=array('jpg','jpeg','png');

        $nombre_y_ext=explode('.',$nombre);
        $extension=strtolower(end($nombre_y_ext));
        
        if(!in_array($extension,$extensiones)){
            echo 'Es un archivo no valido';
            return null;
        }else if($error>0){
            echo 'Hubo un error al subir la imagen';
            return null;
        }else if($tama>1000000){
            echo 'La imagen excede 1MB';
            return null;

        }else {
            $nombre_nuevo = uniqid('',true) . '.' . $extension;
            $destino="../imagenes-Producto/" . $nombre_nuevo;
            move_uploaded_file($origen,$destino);
            
            return $destino;
        }
    }



?>