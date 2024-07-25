<?php require_once "views/layout/header.php"; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Ranking de Ventas</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre Producto</th>
                        <th>Cantidad Total Vendida</th>
                        <th>Venta Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $row) { ?>
                        <tr>
                            <td><?php echo $row['idproducto']; ?></td>
                            <td><?php echo $row['nombre_producto']; ?></td>
                            <td><?php echo $row['cantidad_total']; ?></td>
                            <td><?php echo $row['venta_total']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once "views/layout/footer.php"; ?>
