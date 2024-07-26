
<?php
require_once ROOT_PATH."views/layout/header.php";
 ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nuevo Producto</h1>  
    </div>

    <!-- Content Row -->
    <div class="row">
    <div class="card-body shadow">

    
      <form method="post" action="?c=producto&a=guardar">
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="nomprodu" required>
          </div>
          <div class="form-group">
            <label for="unidad">Unidad</label>
            <input type="text" class="form-control" name="unimed" required>
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" required>
          </div>
          <div class="form-group">
            <label for="costo">Costo Unitario</label>
            <input type="text" class="form-control" name="cosuni" required>
          </div>
          <div class="form-group">
            <label for="precio">Precio Unitario</label>
            <input type="text" class="form-control" name="preuni" required>
          </div>
          <div class="form-group">
            <label for="cbocategoria">Categoria</label>
            <select class="form-control" name="categoria" required>
             <option value="0">Seleccione Categoria</option> 
            <?php
              $ocat = new ModeloCategoria;
              $datocat = $ocat->listaCategorias();
              foreach($datocat as $filacat) {
                echo "<option value='".$filacat["idcategoria"]."'>".$filacat["nomcategoria"]."</option>";
              } 
              ?>
              </select>

          </div>
          <div class="form-group">
            <label for="cboproveedor">Proveedor</label>
            <select class="form-control" name="proveedor" required>
            <option value="0">Seleccione Proveedor</option> 
            <?php
              $oprov = new ModeloProveedor;
              $datoprov = $oprov->listaProveedores();
              foreach($datoprov as $filaprov) {
                echo "<option value='".$filaprov["idproveedor"]."'>".$filaprov["nomproveedor"]."</option>";
              } 
              ?>
            </select>
          </div>
          <input class="btn btn-primary" type="submit" value="Guardar">
          <a class="btn btn-secondary" href="?c=producto&a=index">Cancelar</a>
        </form>
      </div>
    </div>

    

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once ROOT_PATH."views/layout/footer.php";
 ?>