<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


    if(isset($_POST['guardar'])){
        require_once('configProductos.php');
        
        $producto= new Producto();

        $producto->setCategoriaId($_POST['categoriaId']);
        $producto->setPrecioUnitario($_POST['precioUnitario']);
        $producto->setStock($_POST['stock']);
        $producto->setUnidadesPedidas($_POST['unidadesPedidas']);
        $producto->setProveedorId($_POST['proveedorId']);
        $producto->setNombreProducto($_POST['nombre']);
        $producto->setDescontinuado($_POST['descontinuado']);
        $producto->insertData();


        echo"<script> document.location='proveedores.php'</script>";

    }



?>