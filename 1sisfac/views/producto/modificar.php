<?php
require_once ROOT_PATH."views/layout/header.php";

 ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Actualizando Producto</h1>  
    </div>

    <!-- Content Row -->
    <div class="row">
    <div class="card-body shadow">
   
      <form method="post" action="?c=producto&a=actualizar">
          
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $datos['idproducto']; ?>">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="nomprodu" value="<?php echo $datos['nomproducto']; ?>">
          </div>
          <div class="form-group">
            <label for="unidad">Unidad</label>
            <input type="text" class="form-control" name="unimed" value="<?php echo $datos['unimed']; ?>">
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" value="<?php echo $datos['stock']; ?>">
          </div>
          <div class="form-group">
            <label for="costo">Costo Unitario</label>
            <input type="text" class="form-control" name="cosuni" value="<?php echo $datos['cosuni']; ?>">
          </div>
          <div class="form-group">
            <label for="precio">Precio Unitario</label>
            <input type="text" class="form-control" name="preuni" value="<?php echo $datos['preuni']; ?>">
          </div>
          <div class="form-group">
            <label for="cbocategoria">Categoria</label>
            <select class="form-control" name="categoria" >
             <option value="0">Seleccione Categoria</option> 
            <?php
              $ocat = new ModeloCategoria;
              $datocat = $ocat->listaCategorias();
              foreach($datocat as $filacat) {
                if ($filacat['idcategoria']==$datos['idcategoria']) $selcat ="selected";
                else $selcat="";

                echo "<option $selcat value='".$filacat["idcategoria"]."'>".$filacat["nomcategoria"]."</option>";
              } 
              ?>
              </select>

          </div>
          <div class="form-group">
            <label for="cboproveedor">Proveedor</label>
            <select class="form-control" name="proveedor" >
            <option value="0">Seleccione Proveedor</option> 
            <?php
              $oprov = new ModeloProveedor;
              $datoprov = $oprov->listaProveedores();
              foreach($datoprov as $filaprov) {
                if ($filaprov['idproveedor']==$datos['idproveedor']) $selprov ="selected";
                else $selprov="";

                echo "<option $selprov value='".$filaprov["idproveedor"]."'>".$filaprov["nomproveedor"]."</option>";
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