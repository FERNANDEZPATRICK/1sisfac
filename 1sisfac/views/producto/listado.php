<?php
require_once "views/layout/header.php";
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Listado de Productos</h3>
    </div>
    <div class="card-body">
        <a href="?c=producto&a=nuevo" class="btn btn-success">Nuevo Producto</a>
        <a href="?c=producto&a=ventasPorProducto" class="btn btn-primary">Ventas por Producto</a>
        <a href="?c=producto&a=stockProductos" class="btn btn-info">Stock de Productos</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Producto</th>
                        <th>Unidad de Medida</th>
                        <th>Stock</th>
                        <th>Costo Unitario</th>
                        <th>Precio Unitario</th>
                        <th>Categoría</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['idproducto']; ?></td>
                        <td><?php echo $row['nomproducto']; ?></td>
                        <td><?php echo $row['unimed']; ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td><?php echo $row['cosuni']; ?></td>
                        <td><?php echo $row['preuni']; ?></td>
                        <td><?php echo $row['idcategoria']; ?></td>
                        <td><?php echo $row['idproveedor']; ?></td>
                        <td>
                            <a href="?c=producto&a=editar&id=<?php echo $row['idproducto']; ?>" class="btn btn-warning">Editar</a>
                            <a href="?c=producto&a=borrar&id=<?php echo $row['idproducto']; ?>" class="btn btn-danger">Borrar</a>
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
