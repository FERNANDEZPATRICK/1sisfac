<?php
require_once "views/layout/header.php";
?>

<style>
.boleta {
    border: 1px solid #000;
    padding: 20px;
    border-radius: 8px;
    background-color: #fff;
    margin-bottom: 20px;
    width: 400px;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.boleta-header {
    border-bottom: 1px solid #000;
    margin-bottom: 10px;
    padding-bottom: 10px;
    text-align: center;
}

.boleta-header h4 {
    margin: 0;
    font-size: 18px;
}

.boleta-header p {
    margin: 2px 0;
}

.boleta-body {
    margin-bottom: 10px;
}

.boleta-body p {
    margin: 5px 0;
    font-size: 14px;
}

.boleta-footer {
    border-top: 1px solid #000;
    margin-top: 10px;
    padding-top: 10px;
    text-align: right;
    font-size: 12px;
}

.boleta-footer a {
    margin-left: 10px;
}
</style>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Lista de Boletas de Ventas</h3>
    </div>

    <div class="card-body">
        <?php foreach ($datos as $row) { ?>
            <div class="boleta">
                <div class="boleta-header">
                    <h4>FACTURA ELECTRÓNICA</h4>
                    <p>FACTURA: <?php echo $row['idfactura']; ?></p>
                    <p>Fecha: <?php echo $row['fecha']; ?></p>
                </div>
                <div class="boleta-body">
                    <p><strong>Cliente:</strong> <?php echo $row['idcliente']; ?></p>
                    <p><strong>RUC:</strong> 20602953638</p>
                    <p><strong>Producto:</strong> <?php echo $row['idproducto']; ?></p>
                    <p><strong>Cantidad:</strong> <?php echo $row['cant']; ?></p>
                    <p><strong>Precio Unitario:</strong> <?php echo $row['preuni']; ?></p>
                    <p><strong>Condición:</strong> <?php echo $row['condi']; ?></p>
                    <p><strong>Valor de Venta:</strong> <?php echo $row['vventa']; ?></p>
                    <p><strong>IGV:</strong> <?php echo $row['igv']; ?></p>
                </div>
                <div class="boleta-footer">
                    <p><strong>Total Venta:</strong> S/ <?php echo number_format($row['vventa'] + $row['igv'], 2); ?></p>
                    <p><strong>Vendedor(a):</strong> <?php echo $row['idusuario']; ?></p>
                    <p>Representación impresa de la factura electrónica</p>
                    <p>Gracias por su preferencia</p>
                    <a href="index.php?c=venta&a=borrar&id=<?php echo $row['idfactura']; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Borrar
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
require_once "views/layout/footer.php";
?>
