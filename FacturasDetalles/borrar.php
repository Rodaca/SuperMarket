<?php
    require_once("configFacturas.php");

    $record = new FacturaDetalles;

    if(isset($_GET['facturaDetalleId']) && isset($_GET['req'])){
        if($_GET['req']== "delete"){
            $record -> setFacturaDetalleId($_GET['facturaDetalleId']);
            $record -> delete();
            echo "<script>document.location='facturas.php'</script>";
        }
    }


?>