<?php
require_once '../conexion/conexion.php';
require_once '../modelo/Cliente.php';
require_once '../controller/controladores.php';

if (isset($_GET['id'])) {
    $db = (new Conectar())->conexion();
    (new Cliente($db))->eliminar((int)$_GET['id']);
}

redireccionar('index.php');

//

