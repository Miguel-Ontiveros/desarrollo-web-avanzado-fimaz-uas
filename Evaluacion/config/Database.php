<?php
class Database {
    private string $host = "localhost";
    private string $dbname = "evaluacion";
    private string $user = "root";
    private string $password = "";
    private ?PDO $connection = null;
//Ontiveros Valdez Miguel Angel
    public function connect(): PDO {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false
                ]
            );
            return $this->connection;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}