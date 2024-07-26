<?php
require_once "views/layout/header.php";
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Lista de ventas</h3>
        <div class="card text-right">
            <div class="card-body">
                <a href="index.php?c=venta&a=nuevo" class="btn btn-success">Nueva Venta</a> 
            </div>
        </div>
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Fecha Registro</th>
                        <th>Valor de Venta</th>
                        <th>IGV</th>
                        <th>Condición</th>
                        <th>ID Cliente</th>
                        <th>ID Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['idfactura']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['fechareg']; ?></td>
                        <td><?php echo $row['valventa']; ?></td>
                        <td><?php echo $row['igv']; ?></td>
                        <td><?php echo $row['condi']; ?></td>
                        <td><?php echo $row['idcliente']; ?></td>
                        <td><?php echo $row['idusuario']; ?></td>
                        <td>
                            <a href="index.php?c=venta&a=editar&id=<?php echo $row['idfactura']; ?>" class="btn btn-success btn-circle btn-sm">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="index.php?c=venta&a=borrar&id=<?php echo $row['idfactura']; ?>" class="btn btn-danger btn-circle btn-sm">
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