<?php
require_once ROOT_PATH."views/layout/header.php";
 ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregando Usuario</h1>  
    </div>

    <!-- Content Row -->
    <div class="row">
    <div class="card-body shadow">

    

    <form method="post" action="?c=usuario&a=guardar">
          <div class="form-group">
            <label for="descripcion">Nombre Usuario</label>
            <input type="text" class="form-control" name="nomusu" required>
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="text" class="form-control" name="pass" required>
          </div>
          <div class="form-group">
            <label for="stock">apellidos</label>
            <input type="text" class="form-control" name="ape" required>
          </div>
          <div class="form-group">
            <label for="costo">Nombres</label>
            <input type="text" class="form-control" name="nom" required>
          </div>
          <div class="form-group">
            <label for="precio">Email</label>
            <input type="text" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label for="precio">estado</label>
            <input type="text" class="form-control" name="est" required>
          </div>
          
          <input class="btn btn-primary" type="submit" value="Guardar">
          <a class="btn btn-secondary" href="?c=usuario&a=index">Cancelar</a>
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