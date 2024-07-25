<?php
require_once "views/layout/header.php";
 ?>

 <div class="card shadow mb-4">

    
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Listado de proveedores</h3>
        <div class="card text-right">
            <div class="card-body">
                <a href="index.php?c=proveedor&a=nuevo" class="btn btn-success">Nuevo Proveedor</a> 
               
            </div>
        </div>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>RUC</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                       foreach ($datos as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['idproveedor']; ?></td>
                        <td><?php echo $row['nomproveedor']; ?></td>
                        <td><?php echo $row['rucproveedor']; ?></td>
                        <td><?php echo $row['dirproveedor']; ?></td>
                        <td><?php echo $row['telproveedor']; ?></td>
                        <td><?php echo $row['emailproveedor']; ?></td>
                        <td>
                        <a href="index.php?c=proveedor&a=editar&id=<?php echo $row['idproveedor']; ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                        </a>
                        <a href="index.php?c=proveedor&a=borrar&id=<?php echo $row['idproveedor']; ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


</div>

<?php
require_once "views/layout/footer.php"; 
?>

 