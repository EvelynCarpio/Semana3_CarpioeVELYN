<?php

// ESCAPAR TEXTO PARA HTML SEGURO
function limpiar(?string $dato): string {
    return htmlspecialchars(trim($dato ?? ''), ENT_QUOTES, 'UTF-8');
}

// REDIRECCIONAR DE PÁGINA
function redireccionar(string $url): void {
    header("Location: $url");
    exit;
}

// CARGAR DATOS DEL FORMULARIO EN EL OBJETO CLIENTE
function cargarDatosCliente(Cliente $cliente, array $datos): void {
    $cliente->cedula           = trim($datos['cedula'] ?? '');
    $cliente->nombres          = trim($datos['nombres'] ?? '');
    $cliente->apellidos        = trim($datos['apellidos'] ?? '');
    $cliente->email            = trim($datos['email'] ?? '');
    $cliente->telefono         = trim($datos['telefono'] ?? '');
    $cliente->direccion        = trim($datos['direccion'] ?? '');
    $cliente->ciudad           = trim($datos['ciudad'] ?? '');
    $cliente->fecha_nacimiento = trim($datos['fecha_nacimiento'] ?? '');
    $cliente->nombre_comercial = trim($datos['nombre_comercial'] ?? '');
    $cliente->estado           = $datos['estado'] ?? 'Activo';
}