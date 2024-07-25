<?php
require_once ROOT_PATH . "views/layout/header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nueva Venta</h1>  
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="card-body shadow">

      <form method="post" action="?c=venta&a=guardar">
        <div class="form-group">
          <label for="fech">Fecha</label>
          <input type="date" class="form-control" name="fech" required>
        </div>
        <div class="form-group">
          <label for="fechr">Fecha de registro</label>
          <input type="date" class="form-control" name="fechr" required>
        </div>
        <div class="form-group">
          <label for="vventa">Valor de venta</label>
          <input type="number" step="0.01" class="form-control" name="vventa" required>
        </div>
        <div class="form-group">
          <label for="igv">IGV</label>
          <input type="number" step="0.01" class="form-control" name="igv" required>
        </div>
        <div class="form-group">
          <label for="condi">Condición</label>
          <input type="text" class="form-control" name="condi" required>
        </div>
        <div class="form-group">
          <label for="cant">Cantidad</label>
          <input type="number" class="form-control" name="cant" required>
        </div>
        <div class="form-group">
          <label for="cant">Precio unitaruio</label>
          <input type="number" class="form-control" name="preuni" required>
        </div>
        <div class="form-group">
          <label for="idus">Usuario</label>
          <select class="form-control" name="idus" required>
            <option value="">Seleccione Usuario</option>
            <?php
              try {
                $usuarioModel = new ModeloUsuario();
                $usuarios = $usuarioModel->listaUsuarios();
                foreach($usuarios as $usuario) {
                  echo "<option value='".$usuario["idusuario"]."'>".$usuario["nomusuario"]."</option>";
                }
              } catch (Exception $e) {
                echo "<option value=''>Error al cargar usuarios</option>";
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="idcli">Cliente</label>
          <select class="form-control" name="idcli" required>
            <option value="">Seleccione Cliente</option>
            <?php
              try {
                $clienteModel = new ModeloCliente();
                $clientes = $clienteModel->listaClientes();
                foreach($clientes as $cliente) {
                  echo "<option value='".$cliente["idcliente"]."'>".$cliente["nomcliente"]."</option>";
                }
              } catch (Exception $e) {
                echo "<option value=''>Error al cargar clientes</option>";
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="idproducto">Producto</label>
          <select class="form-control" name="idpro" required>
            <option value="">Seleccione Producto</option>
            <?php
              try {
                $productoModel = new ModeloProducto();
                $productos = $productoModel->listaProductos();
                foreach($productos as $producto) {
                  echo "<option value='".$producto["idproducto"]."'>".$producto["nomproducto"]."</option>";
                }
              } catch (Exception $e) {
                echo "<option value=''>Error al cargar productos</option>";
              }
            ?>
          </select>
        </div>



        <input class="btn btn-primary" type="submit" value="Guardar">
        <a class="btn btn-secondary" href="?c=venta&a=index">Cancelar</a>
      </form>
    </div>
  </div>

  

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once ROOT_PATH . "views/layout/footer.php";
?>
