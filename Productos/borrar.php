<?php
    require_once("configProductos.php");

    $record = new Producto();

    if(isset($_GET['productoId']) && isset($_GET['req'])){
        if($_GET['req']== "delete"){
            $record -> setProductoId($_GET['productoId']);
            $record -> delete();
            echo "<script> document.location='productos.php'</script>";
        }
    }


?>