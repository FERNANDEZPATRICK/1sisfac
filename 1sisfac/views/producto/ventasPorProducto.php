<?php require_once "views/layout/header.php"; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Ventas por Producto</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Total Vendido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $producto) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['nomproducto']); ?></td>
                            <td><?php echo htmlspecialchars($producto['total_vendido']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once "views/layout/footer.php"; ?>
