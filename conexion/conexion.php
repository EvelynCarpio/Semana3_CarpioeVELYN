<?php
class Conectar {
    private string $servidor = "localhost";
    private string $puerto   = "3307";
    private string $bd       = "clientes";
    private string $usuario  = "root";
    private string $password = "";
    private string $charset  = "utf8mb4";

    public function conexion(): PDO {
        $dsn = "mysql:host={$this->servidor};port={$this->puerto};dbname={$this->bd};charset={$this->charset}";

        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            return new PDO($dsn, $this->usuario, $this->password, $opciones);
        } catch (PDOException $e) {
            die("FALLO CONEXION: " . $e->getMessage());
        }
    }
}  

