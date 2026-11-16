<?php
require_once '../conexion/conexion.php';
require_once '../modelo/Cliente.php';
require_once '../controller/controladores.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = (new Conectar())->conexion();
    $cliente = new Cliente($db);
    cargarDatosCliente($cliente, $_POST);

    if ($cliente->crear()) {
        redireccionar('index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow border-0 mx-auto" style="max-width: 750px;">
        <div class="card-header bg-primary text-white py-3 px-4">
            <h4 class="mb-0 fw-bold">Nuevo Cliente</h4>
        </div>

        <div class="card-body p-4">
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Cédula o RUC</label>
                        <input type="text" name="cedula" class="form-control" required maxlength="20">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Nombres</label>
                        <input type="text" name="nombres" class="form-control" required maxlength="100">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" required maxlength="100">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" required maxlength="100">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" required maxlength="100">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label fw-bold">Dirección</label>
                        <input type="text" name="direccion" class="form-control" required maxlength="100">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control" required maxlength="100">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Nombre Comercial</label>
                        <input type="text" name="nombre_comercial" class="form-control" required maxlength="100">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Estado</label>
                        <select name="estado" class="form-select" required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="index.php" class="btn btn-danger px-4">Cancelar</a>
                    <button type="submit" class="btn btn-warning fw-bold px-4">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>