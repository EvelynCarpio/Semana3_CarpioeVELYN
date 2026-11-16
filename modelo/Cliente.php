<?php
class Cliente {
    private PDO $conn;

    public ?int $id_cliente = null;
    public string $cedula = '';
    public string $nombres = '';
    public string $apellidos = '';
    public string $email = '';
    public string $telefono = '';
    public string $direccion = '';
    public string $ciudad = '';
    public string $fecha_nacimiento = '';
    public string $nombre_comercial = '';
    public string $estado = 'Activo';

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function listar(): array {
        $stmt = $this->conn->query("SELECT * FROM clientes ORDER BY id_cliente DESC");
        return $stmt->fetchAll();
    }

    public function obtenerPorId(int $id): bool {
        $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_INTO, $this);
        return (bool) $stmt->fetch();
    }

    public function crear(): bool {
        $sql = "INSERT INTO clientes (cedula, nombres, apellidos, email, telefono, direccion, ciudad, fecha_nacimiento, nombre_comercial, estado)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $this->cedula, $this->nombres, $this->apellidos, $this->email, $this->telefono,
            $this->direccion, $this->ciudad, $this->fecha_nacimiento, $this->nombre_comercial, $this->estado
        ]);
    }

    public function actualizar(): bool {
        $sql = "UPDATE clientes SET cedula=?, nombres=?, apellidos=?, email=?, telefono=?, direccion=?, ciudad=?, fecha_nacimiento=?, nombre_comercial=?, estado=?
                WHERE id_cliente=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $this->cedula, $this->nombres, $this->apellidos, $this->email, $this->telefono,
            $this->direccion, $this->ciudad, $this->fecha_nacimiento, $this->nombre_comercial, $this->estado, $this->id_cliente
        ]);
    }

    public function eliminar(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM clientes WHERE id_cliente = ?");
        return $stmt->execute([$id]);
    }
}