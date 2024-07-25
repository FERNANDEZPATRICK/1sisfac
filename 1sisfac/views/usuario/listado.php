<?php
require_once "views/layout/header.php";
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Listado de Clientes</h3>
        <div class="card text-right">
            <div class="card-body">
                <a href="index.php?c=usuario&a=nuevo" class="btn btn-success">Nuevo Cliente</a>
            </div>
        </div>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de usuario</th>
                        <th>Password</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Estado</th>
  
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $row) { ?>
                    <tr>
                        <td><?php echo $row['idusuario']; ?></td>
                        <td><?php echo $row['nomusuario']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['apellidos']; ?></td>
                        <td><?php echo $row['nombres']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td>
                            <a href="index.php?c=usuario&a=editar&id=<?php echo $row['idusuario']; ?>" class="btn btn-success btn-circle btn-sm">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="index.php?c=usuario&a=borrar&id=<?php echo $row['idusuario']; ?>" class="btn btn-danger btn-circle btn-sm">
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

<?php
require_once "views/layout/footer.php";
?>
