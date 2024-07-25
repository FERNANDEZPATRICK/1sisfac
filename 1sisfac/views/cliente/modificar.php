<?php
require_once ROOT_PATH."views/layout/header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Modificando cliente</h1>  
</div>

<!-- Content Row -->
<div class="row">
<div class="card-body shadow">

  <form method="post" action="?c=cliente&a=actualizar">
      
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $datos['idcliente']; ?>">
        <label for="nomusu">Nombre de cliente</label>
        <input type="text" class="form-control" name="nomcli" value="<?php echo $datos['nomcliente']; ?>">
    </div>
    <div class="form-group">
        <label for="pass">RUC</label>
        <input type="text" class="form-control" name="ruccli" value="<?php echo $datos['ruccliente']; ?>">
    </div>
    <div class="form-group">
        <label for="ape">Direccion</label>
        <input type="text" class="form-control" name="dircli" value="<?php echo $datos['dircliente']; ?>">
    </div>
    <div class="form-group">
        <label for="nom">Telefono</label>
        <input type="text" class="form-control" name="telcli" value="<?php echo $datos['telcliente']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $datos['emailcliente']; ?>">
    </div>

      
    <input class="btn btn-primary" type="submit" value="Guardar">
    <a class="btn btn-secondary" href="?c=cliente&a=index">Cancelar</a>
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
