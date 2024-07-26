<?php
require_once "views/layout/header.php";
 ?>

 <div class="card shadow mb-4">

    
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Listado de Condicion</h3>
        <div class="card text-right">
            <div class="card-body">
                <a href="index.php?c=condicion&a=nuevo" class="btn btn-success">Nueva Condicion</a> 
               
            </div>
        </div>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de condicion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                       foreach ($datos as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['idcondicion']; ?></td>
                        <td><?php echo $row['nomcondicion']; ?></td>
                        <td>
                        <a href="index.php?c=condicion&a=editar&id=<?php echo $row['idcondicion']; ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                        </a>
                        <a href="index.php?c=condicion&a=borrar&id=<?php echo $row['idcondicion']; ?>" class="btn btn-danger btn-circle btn-sm">
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

 