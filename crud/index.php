<?php
require_once '../conexion/conexion.php';
require_once '../modelo/Cliente.php';
require_once '../controller/controladores.php';

$db = (new Conectar())->conexion();
$clientes = (new Cliente($db))->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="bg-light">

<div class="container-fluid py-4 px-4">
    <div class="card shadow-sm border-0">
        <div class="container">
            <h4 class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">Listado de Clientes</h4>
            <a href="crear.php" class="btn btn-warning"> Nuevo Cliente</a>
        </div>

        <div class="card-body">
            <?php if (isset($_GET['msg'])): ?>
                <div class="container" role="alert">
                    Listo.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <div class="container">
            <div class="card mt-4 shadow">
                <table class="card-body">
                    <thead class="table-dark">
                        <tr>
                            <th>Cédula o RUC</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Nombre Comercial</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    </div>
                    <tbody>
                        <?php if (count($clientes) > 0): ?>
                            <?php foreach ($clientes as $c): ?>
                            <tr>
                                <td class="fw-semibold"><?= limpiar($c['cedula']) ?></td>
                                <td><?= limpiar($c['nombres']) ?></td>
                                <td><?= limpiar($c['apellidos']) ?></td>
                                <td><?= limpiar($c['email']) ?></td>
                                <td><?= limpiar($c['telefono']) ?></td>
                                <td><?= limpiar($c['direccion']) ?></td>
                                <td><?= limpiar($c['ciudad']) ?></td>
                                <td><?= limpiar($c['fecha_nacimiento']) ?></td>
                                <td><?= limpiar($c['nombre_comercial']) ?></td>
                                <td class="text-center">
                                    <span class="badge <?= $c['estado'] === 'Activo' ? 'bg-success' : 'bg-danger' ?>">
                                        <?= limpiar($c['estado']) ?>
                                    </span>
                                </td>
                                <td class="text-center text-nowrap">
                                    <a href="editar.php?id=<?= $c['id_cliente'] ?>" class="btn btn-warning">Editar</a>
                                    <a href="eliminar.php?id=<?= $c['id_cliente'] ?>" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('¿Eliminar cliente?')">Eliminar</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center py-4 text-muted">No hay clientes registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>