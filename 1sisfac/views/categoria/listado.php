<?php
require_once "views/layout/header.php";
 ?>

 <div class="card shadow mb-4">

    
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Listado de Categorias</h3>
        <div class="card text-right">
            <div class="card-body">
                <a href="index.php?c=categoria&a=nuevo" class="btn btn-success">Nueva Categoria</a> 
               
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
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                       foreach ($datos as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['idcategoria']; ?></td>
                        <td><?php echo $row['nomcategoria']; ?></td>
                        <td>
                        <a href="index.php?c=categoria&a=editar&id=<?php echo $row['idcategoria']; ?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                        </a>
                        <a href="index.php?c=categoria&a=borrar&id=<?php echo $row['idcategoria']; ?>" class="btn btn-danger btn-circle btn-sm">
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

 