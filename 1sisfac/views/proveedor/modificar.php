<?php
require_once ROOT_PATH . "views/layout/header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modificando Proveedor</h1>  
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body shadow">
            <form method="post" action="?c=Proveedor&a=actualizar">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($datos['idproveedor']); ?>">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($datos['nomproveedor']); ?>">
                </div>
                <div class="form-group">
                    <label for="ruc">RUC</label>
                    <input type="text" class="form-control" name="ruc" value="<?php echo htmlspecialchars($datos['rucproveedor']); ?>">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="dirpro" value="<?php echo htmlspecialchars($datos['dirproveedor']); ?>">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telpro" value="<?php echo htmlspecialchars($datos['telproveedor']); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($datos['emailproveedor']); ?>">
                </div>
                
                <input class="btn btn-primary" type="submit" value="Guardar">
                <a class="btn btn-secondary" href="?c=proveedor&a=index">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
require_once ROOT_PATH . "views/layout/footer.php";
?>
