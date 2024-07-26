<?php
// Incluye el controlador necesario
require_once ROOT_PATH . "controllers/VentaController.php";

// Instancia el controlador
$ventaController = new VentaController();

// Verifica si se ha enviado la solicitud de consulta
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fecha'])) {
    $fecha = $_POST['fecha'];
    $datos = $ventaController->consultarPorFecha($fecha);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Ventas por Fecha</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="mt-4">Consultar Ventas por Fecha</h3>
        <form action="index.php?c=venta&a=consultarPorFecha" method="post">
            <div class="form-group">
                <label for="fechaConsulta">Fecha:</label>
                <input type="date" name="fecha" id="fechaConsulta" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>

        <?php if (isset($datos) && !empty($datos)) { ?>
            <hr>
            <h4>Resultados de la Consulta</h4>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Fecha Registro</th>
                        <th>Valor de Venta</th>
                        <th>IGV</th>
                        <th>ID Condición</th>
                        <th>ID Cliente</th>
                        <th>ID Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $row) { ?>
                    <tr>
                        <td><?php echo $row['idfactura']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['fechareg']; ?></td>
                        <td><?php echo $row['valventa']; ?></td>
                        <td><?php echo $row['igv']; ?></td>
                        <td><?php echo $row['idcondicion']; ?></td>
                        <td><?php echo $row['idcliente']; ?></td>
                        <td><?php echo $row['idusuario']; ?></td>
                        <td>
                            <a href="index.php?c=venta&a=editar&id=<?php echo $row['idfactura']; ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-check"></i> Editar
                            </a>
                            <a href="index.php?c=venta&a=borrar&id=<?php echo $row['idfactura']; ?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Borrar
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
    <script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>
