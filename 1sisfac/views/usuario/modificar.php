<?php
require_once ROOT_PATH."views/layout/header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Modificando Usuario</h1>  
</div>

<!-- Content Row -->
<div class="row">
<div class="card-body shadow">

  <form method="post" action="?c=usuario&a=actualizar">
      
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $datos['idusuario']; ?>">
        <label for="nomusu">Nombre de usuario</label>
        <input type="text" class="form-control" name="nomusu" value="<?php echo $datos['nomusuario']; ?>">
    </div>
    <div class="form-group">
        <label for="pass">Password</label>
        <input type="text" class="form-control" name="pass" value="<?php echo $datos['password']; ?>">
    </div>
    <div class="form-group">
        <label for="ape">Apellidos</label>
        <input type="text" class="form-control" name="ape" value="<?php echo $datos['apellidos']; ?>">
    </div>
    <div class="form-group">
        <label for="nom">Nombres</label>
        <input type="text" class="form-control" name="nom" value="<?php echo $datos['nombres']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $datos['email']; ?>">
    </div>
    <div class="form-group">
        <label for="est">Estado</label>
        <input type="text" class="form-control" name="est" value="<?php echo $datos['estado']; ?>">
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
