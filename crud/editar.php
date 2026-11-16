<?php
require_once '../conexion/conexion.php';
require_once '../modelo/Cliente.php';
require_once '../controller/controladores.php';

if (!isset($_GET['id'])) redireccionar('index.php');

$db = (new Conectar())->conexion();
$cliente = new Cliente($db);

if (!$cliente->obtenerPorId((int)$_GET['id'])) redireccionar('index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    cargarDatosCliente($cliente, $_POST);

    if ($cliente->actualizar()) {
        redireccionar('index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="contenedor contenedor-form">
    <div class="cabecera">
        <h2>Editar Cliente</h2>
    </div>

    <form method="POST">
        <div class="grid-form">
            <div class="campo">
                <label class="form-label fw-bold">Cédula </label>
                <input type="text" name="cedula" required maxlength="20" value="<?= limpiar($cliente->cedula) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Nombres</label>
                <input type="text" name="nombres" required maxlength="100" value="<?= limpiar($cliente->nombres) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Apellidos</label>
                <input type="text" name="apellidos" required maxlength="100" value="<?= limpiar($cliente->apellidos) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" required maxlength="100" value="<?= limpiar($cliente->email) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Teléfono </label>
                <input type="text" name="telefono" required maxlength="100" value="<?= limpiar($cliente->telefono) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Dirección </label>
                <input type="text" name="direccion" required maxlength="100" value="<?= limpiar($cliente->direccion) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Ciudad</label>
                <input type="text" name="ciudad" required maxlength="100" value="<?= limpiar($cliente->ciudad) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Fecha de Nacimiento </label>
                <input type="date" name="fecha_nacimiento" required value="<?= limpiar($cliente->fecha_nacimiento) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Nombre Comercial </label>
                <input type="text" name="nombre_comercial" required maxlength="100" value="<?= limpiar($cliente->nombre_comercial) ?>">
            </div>
            <div class="campo">
                <label class="form-label fw-bold">Estado </label>
                <select name="estado" required>
                    <option value="Activo" <?= $cliente->estado === 'Activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="Inactivo" <?= $cliente->estado === 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>
        </div>

        <div class="acciones-form">
            <a href="index.php" class="btn btn-volver">Cancelar</a>
            <button type="submit" class="btn btn-editar">Actualizar</button>
        </div>
    </form>
</div>
</body>
</html>