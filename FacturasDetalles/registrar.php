<?php
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);


    if(isset($_POST['guardar'])){
        require_once('configFacturas.php');
        $factura= new FacturaDetalles();

        $factura->setFacturaId($_POST['facturaId']);
        $factura->setProductoId($_POST['productoId']);
        $factura->setCantidad($_POST['cantidad']);
        $factura->setPrecioVenta($_POST['precioVenta']);
        
        $factura->insertData();
        echo"<script> alert('Los datos fueron guardados satisfactoriamente'); document.location='facturas.php'</script>";

    }



?>