<?php
require_once ROOT_PATH."views/layout/header.php";

 ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modificando Condicion</h1>  
    </div>

    <!-- Content Row -->
    <div class="row">
    <div class="card-body shadow">
   
      <form method="post" action="?c=condicion&a=actualizar">
          
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $datos['idcondicion']; ?>">
            <label for="descripcion">Nombre  de condicion</label>
            <input type="text" class="form-control" name="nomco" value="<?php echo $datos['nomcondicion']; ?>">
          </div>
         
          <input class="btn btn-primary" type="submit" value="Guardar">
          <a class="btn btn-secondary" href="?c=condicion&a=index">Cancelar</a>
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