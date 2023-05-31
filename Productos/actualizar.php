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
        

    $id= $_GET['productoId'];
    $data->setProductoId($id);

    $record = $data->selectOne();

    $values = $record[0];

    if(isset($_POST['editar'])){
        $data->setCategoriaId($_POST['categoriaId']);
        $data->setPrecioUnitario($_POST['precioUnitario']);
        $data->setStock($_POST['stock']);
        $data->setUnidadesPedidas($_POST['unidadesPedidas']);
        $data->setProveedorId($_POST['proveedorId']);
        $data->setNombreProducto($_POST['nombre']);
        $data->setDescontinuado($_POST['descontinuado']);
        $data-> update();
        echo "<script>document.location='productos.php';</script>";

    }


?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Facturas</title>
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
        <h3 style="margin-bottom: 2rem;">Factura</h3>
        <img src="images/Diseño sin título.png" alt="" class="imagenPerfil">
        <h3 >Factura</h3>
      </div>
      <div class="menus">
        <a href="home.html" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Home</h3>
        </a>
        <a href="/Estudiantes/Estudiantes.html" style="display: flex;gap:2px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;">Categoria</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Factura a editar</h2>
      <div class="menuTabla contenedor2">
      <div class="modal-body" style="background-color: rgb(231, 253, 246);">

            <form class="col d-flex flex-wrap" action="" method="post">
              <div class="mb-1 col-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control" 
                  value="<?php echo $values['nombreProducto'];?>"
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
                  <option value="<?php echo $val['categoriaId'];?>"
                  <?php if($val['categoriaId']==$values['categoriaId']){echo "selected";}?>
                  ><?php echo $val['nombre']?></option>
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
                  value="<?php echo $values['unidadesPedidas'];?>"
                />
              </div>
              <div class="mb-1 col-6">
                <label for="precioUnitario" class="form-label">Precio unitario</label>
                <input 
                  type="number"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                  value="<?php echo $values['precioUnitario'];?>"
                />
              </div>
              <div class="mb-1 col-6">
                <label for="stock" class="form-label">Stock</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                  value="<?php echo $values['stock'];?>"
                />
              </div>
              <div class="mb-1 col-6">
                <label for="descontinuado" class="form-label">Estado</label>
                <input 
                  type="text"
                  id="descontinuado"
                  name="descontinuado"
                  class="form-control"  
                  value="<?php echo $values['descontinuado'];?>"
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
                  <option value="<?php echo $val['proveedorId']?>"
                  <?php if($val['proveedorId']==$values['proveedorId']){echo "selected";}?>
                  ><?php echo $val['nombre']?></option>
                  <?php }; ?>
                </select>
              </div>
              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="editar" name="editar"/>              
              </div>
            </form>  
         </div> 
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Cliente</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>