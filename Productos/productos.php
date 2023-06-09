<?php

    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);
    
    error_reporting(E_ALL);

    require_once('configProductos.php');
    $data= new Producto();
    $all= $data ->selectAllId();
    require_once('../Categorias/configCategorias.php');
    require_once('../Proveedores/configProveedores.php');
    $categoria= new Categoria();
    $proveedores =new Proveedor();
    

    $caAll= $categoria ->selectAll();
    $prAll= $proveedores ->selectAll();
?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Productos</h3>
        <img src="./img/ilustracion-vectorial-de-dibujos-animados-presentacion-de-alimentos-vendedor-de-helados-t6hr2e.jpg" alt="" class="imagenPerfil">
        <h3>Productos</h3>
      </div>
      <div class="menus">
        <a href="../Categorias/superMarket.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="../Categorias/superMarket.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Categorias</h3>
        </a>
        <a href="../Clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../Empleados/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../Proveedores/proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>


        <a href="../Facturas/facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="../Productos/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="../FacturasDetalles/facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas Detalles</h3>
        </a>

      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Facturas</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRE</th>
              <th scope="col">CATEGORIA</th>
              <th scope="col">CANTIDAD</th>
              <th scope="col">PRECIO UNIDAD</th>
              <th scope="col">STOCK</th>
              <th scope="col">PROVEEDOR</th> 
              <th scope="col">ESTADO</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <?php
              foreach($all as $Key=> $val ){

              
            ?>
            <tr>
              <td><?php echo $val['productoId']?> </td>
              <td><?php echo $val['nombreProducto']?> </td>
              <td><?php echo $val['categoriaNombre']?> </td>
              <td><?php echo $val['unidadesPedidas']?> </td>
              <td><?php echo $val['precioUnitario']?> </td>
              <td><?php echo $val['stock']?> </td>
              <td><?php echo $val['proveedorNombre']?> </td>
              <td><?php echo $val['descontinuado']?> </td>
              <td>
                  <a class="btn btn-danger" href="borrar.php?productoId=<?=$val['productoId']?>&req=delete">Borrar</a>
                  <a class="btn btn-warning" href="actualizar.php?productoId=<?=$val['productoId']?>">Actualizar</a>
              </td>
            </tr>
            <?php }; ?>
          </tbody>
        
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Productos</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">

            <form class="col d-flex flex-wrap" action="registrar.php" method="post">
              <div class="mb-1 col-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="categoriaId" class="form-label">Categoria</label>
                <select 
                  id="categoriaId"
                  name="categoriaId"
                  class="form-select" >
                  <?php
                    foreach($caAll as $Key=> $val ){?>
                  <option value="<?php echo $val['categoriaId']?>"><?php echo $val['nombre']?></option>
                  <?php }; ?>
                </select>
              </div>
              <div class="mb-1 col-6">
                <label for="unidadesPedidas" class="form-label">Cantidad</label>
                <input 
                  type="number"
                  id="unidadesPedidas"
                  name="unidadesPedidas"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-6">
                <label for="precioUnitario" class="form-label">Precio unitario</label>
                <input 
                  type="number"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-6">
                <label for="stock" class="form-label">Stock</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-6">
                <label for="descontinuado" class="form-label">Estado</label>
                <input 
                  type="text"
                  id="descontinuado"
                  name="descontinuado"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="proveedorId" class="form-label">proveedores</label>
                <select 
                  id="proveedorId"
                  name="proveedorId"
                  class="form-select" >
                  <?php
                    foreach($prAll as $Key=> $val ){?>
                  <option value="<?php echo $val['proveedorId']?>"><?php echo $val['nombre']?></option>
                  <?php }; ?>
                </select>
              </div>
            



              
              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="Guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>

<?php


?>  